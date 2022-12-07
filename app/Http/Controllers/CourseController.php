<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use App\Models\LevelModel;
use App\Models\MemberWatchVideoModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $levels = LevelModel::all();
        $data = [
            'levels' => $levels,
        ];
        $courses = [];
        foreach ($levels as $key => $level) {
            $courses[$level->id] = CourseModel::where('level_id', $level->id)->get();
        }
        $data['courses'] = $courses;
        return Inertia::render('Courses', $data);
    }
    public function course($id)
    {
        //* cek last watch video terakhir user pada course ini
        $lastWatch = MemberWatchVideoModel::where('course_id', $id)
                        ->where('member_id', auth()->user()->id)
                        ->latest()
                        ->first();
        if ($lastWatch) {
            $lastWatchVideo = VideoModel::find($lastWatch->video_id);
            $video_active = VideoModel::where('course_id', $id)
                            ->where('order_number', $lastWatchVideo->order_number + 1)
                            ->first();
            if(!$video_active){
                //* get last video
                $video_active = VideoModel::where('course_id', $id)
                                ->orderBy('order_number', 'desc')
                                ->first();
            }
        } else {
            $video_active = VideoModel::where('course_id', $id)->first();
        }
        
        $data = [
            'course' => CourseModel::find($id),
            'videos' => DB::table('videos')
                        ->select('videos.*', 'member_watch_videos.id as status_watch')
                        ->leftJoin('member_watch_videos', 'videos.id', '=', 'member_watch_videos.video_id')
                        ->where('videos.course_id', $id)
                        ->orderBy('order_number', 'asc')
                        ->get(),
            'video_active' => $video_active
        ];
        return Inertia::render('Course', $data);
    }
    public function mark_as_done(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
            'course_id' => 'required'
        ]);

        $memberWatchVideo = MemberWatchVideoModel::where('member_id', auth()->user()->id)
                            ->where('video_id', $request->post('video_id'))
                            ->where('course_id', $request->post('course_id'))
                            ->first();
        if(!$memberWatchVideo){
            $memberWatchVideo = new MemberWatchVideoModel([
                'member_id' => auth()->user()->id,
                'video_id' => $request->post('video_id'),
                'course_id' => $request->post('course_id'),
            ]);
            $memberWatchVideo->save();
        }


        request()->session()->flash('alert', [[
            'type' => 'success',
            'message' => 'Video telah ditandai selesai!',
        ]]);

        return Inertia::location('/course/' . $request->post('course_id'));
    }
}

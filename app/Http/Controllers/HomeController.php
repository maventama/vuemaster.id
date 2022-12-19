<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use App\Models\LevelModel;
use App\Models\PricingModel;
use App\Models\User;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $levels = LevelModel::all();
        $data = [
            'levels' => $levels,
            'pricings' => PricingModel::with('pricing_features')->get()
        ];
        $courses = [];
        foreach ($levels as $key => $level) {
            $courses[$level->id] = CourseModel::where('level_id', $level->id)->get();
        }
        $data['courses'] = $courses;
        return Inertia::render('Home', $data);
    }
    public function register(Request $request)
    {
        $data = [
            'buy_plan_id' => $request->get('buy_plan'),
            'plan' => PricingModel::find($request->get('buy_plan'))
        ];
        return Inertia::render('Register', $data);
    }
    public function login(Request $request)
    {
        $data = [
            'sr' => $request->get('sr'),
            'buy_plan_id' => $request->get('buy_plan'),
            'plan' => PricingModel::find($request->get('buy_plan'))
        ];
        return Inertia::render('Login', $data);
    }
    public function process_register(Request $request)
    {
        $request->validate([
            'name_user' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $user = new User([
            'name' => $data['name_user'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 3
        ]);
        $user->save();
        
        request()->session()->flash('alert', [[
            'type' => 'success',
            'message' => 'Berhasil melakukan pendaftaran, silakan login!',
        ]]);

        return Inertia::location('/login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            //* redirect ke halaman xendit payment
            if($request->post('buy_plan_id')){
                $pricing = PricingModel::find($request->post('buy_plan_id'));
                return Inertia::location('/plan/tap_to_payment?buy_plan_id=' . $pricing->id);
            }

            request()->session()->flash('alert', [[
                'type' => 'success',
                'message' => 'Halo ' . auth()->user()->name . ', semangat belajar!',
            ]]);

            return Inertia::location('/courses');
        }


        request()->session()->flash('alert', [[
            'type' => 'danger',
            'message' => 'Email atau password salah, silakan ulangi!',
        ]]);
        
        return Inertia::location('/login');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'videos';
    protected $guarded = [];
    public function video_watches()
    {
        return $this->hasMany(MemberWatchVideoModel::class, 'id', 'video_id');
    }
}

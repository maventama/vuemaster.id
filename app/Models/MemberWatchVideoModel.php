<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberWatchVideoModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'member_watch_videos';
    protected $guarded = [];
}

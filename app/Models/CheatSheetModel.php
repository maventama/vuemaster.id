<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheatSheetModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cheat_sheets';
    protected $guarded = [];
    public function getDownloadLink(){
        $downloadLink = json_decode($this->cheat_sheet, true);
        return $downloadLink['download_link'];
    }
}

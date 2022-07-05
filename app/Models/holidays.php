<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class holidays extends Model
{
    use HasFactory;
    protected $table = 'tbl_holidays_info';
    public $timestamps = false;

    public static function addHoliday(array $data){
        $h = new holidays;
        $h->title = $data['title'];
        $h->date = date('Y-m-d', strtotime($data['date']));
        $h->save();
    }

    public static function updateHoliday($id, array $data){
        $h = holidays::find($id);
        $h->title = $data['title'];
        $h->date = date('Y-m-d', strtotime($data['date']));
        $h->save();
    }
}

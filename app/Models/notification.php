<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\departments;

class notification extends Model
{
    use HasFactory;
    protected $table = 'tbl_notification_info';

    public static function addNotification(array $data){
        $n = new notification;
        $n->department_id = $data['department'];
        $n->title = $data['title'];
        $n->description = $data['description'];
        $n->status = '1';
        $n->save();
    }

    public static function updateNotification($id, array $data){
        $n = notification::find($id);
        $n->department_id = $data['department'];
        $n->title = $data['title'];
        $n->description = $data['description'];
        $n->status = '1';
        $n->save();
    }


    public function depart(){
        return $this->belongsTo(departments::class, 'department_id');
    }
}

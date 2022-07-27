<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\leaveAssigned;
use Auth;

class leaveType extends Model
{
    use HasFactory;
    protected $table = 'tbl_leaves_type_info';


    public function leaves(){
        return $this->belongsTo(leaveAssigned::class, 'id', 'type_id')->where('user_id', Auth::id())->where('year', date('Y'));
    }
}

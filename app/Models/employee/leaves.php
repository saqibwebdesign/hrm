<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leaveType;

class leaves extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_leaves_info';


    public function type(){
        return $this->belongsTo(leaveType::class, 'type_id');
    }
}

<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leaveAssigned extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_leaves_assign_info';
    public $timestamps = false;
}

<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_experience_info';
    public $timestamps = false;
}

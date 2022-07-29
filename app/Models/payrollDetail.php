<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\payroll;
use App\Models\User;

class payrollDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_payroll_info';


    public function payroll(){
        return $this->belongsTo(payroll::class, 'payroll_id');
    }

    public function emp(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

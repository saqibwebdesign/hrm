<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\banks;

class bankAccount extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_bank_account_info';
    public $timestamps = false;

    public function bank(){
        return $this->belongsTo(banks::class, 'bank_id');
    }
}

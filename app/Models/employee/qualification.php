<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\eduLevel;

class qualification extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_qualification_info';
    public $timestamps = false;

    public function lvl(){
        return $this->belongsTo(eduLevel::class, 'level');
    }
}

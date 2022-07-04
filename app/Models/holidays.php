<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class holidays extends Model
{
    use HasFactory;
    protected $table = 'tbl_holidays_info';
    public $timestamps = false;
}

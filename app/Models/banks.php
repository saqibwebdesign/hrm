<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banks extends Model
{
    use HasFactory;
    protected $table = 'tbl_banks_info';
    public $timestamps = false;
}

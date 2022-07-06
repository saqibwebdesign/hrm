<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class departments extends Model
{
    use HasFactory;
    protected $table = 'tbl_departments_info';
    public $timestamps = false;


    public function users(){
        return $this->hasMany(User::class, 'department_id', 'id');
    }
}

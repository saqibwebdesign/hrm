<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class shifts extends Model
{
    use HasFactory;
    protected $table = 'tbl_shifts_info';

    protected $fillable = [
        'title',
        'check_in',
        'check_out',
        'grace_time',
        'status'
    ];

    public function emp(){
        return $this->hasMany(User::class, 'shift_id', 'id');
    }
}

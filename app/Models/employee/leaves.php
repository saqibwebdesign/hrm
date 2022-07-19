<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leaveType;
use App\Models\User;

class leaves extends Model
{
    use HasFactory;
    protected $table = 'tbl_emp_leaves_info';

    protected $fillable = [
        'user_id',
        'type_id',
        'from_date',
        'to_date',
        'days',
        'reason',
        'status',
    ];

    public function type(){
        return $this->belongsTo(leaveType::class, 'type_id');
    }
    public function emp(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

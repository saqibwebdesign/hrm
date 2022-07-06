<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\departments;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tbl_users_info';


    public static function addUser(array $data){
        $c = new User;
        $c->firstname = $data['firstname'];
        $c->lastname = $data['lastname'];
        $c->gender = $data['gender'];
        $c->maritial_status = $data['maritial_status'];
        $c->dob = date('Y-m-d', strtotime($data['dob']));
        $c->email = $data['email'];
        $c->password = bcrypt($data['password']);
        $c->phone = $data['phone'];
        $c->emergency_phone = $data['emergency_phone'];
        $c->address = $data['address'];
        $c->city = $data['city'];
        $c->state = $data['state'];
        $c->country = $data['country'];
        $c->postal_code = $data['postal_code'];
        $c->department_id = $data['department_id'];
        $c->designation = $data['designation'];
        $c->basic_salary = $data['basic_salary'];
        $c->joining_date = date('Y-m-d', strtotime($data['joining_date']));
        $c->save();

        return $c->id;
    }

    public static function updatePortfolio($id, array $data){
        $c = User::find($id);
        $c->firstname = $data['firstname'];
        $c->lastname = $data['lastname'];
        $c->gender = $data['gender'];
        $c->maritial_status = $data['maritial_status'];
        $c->dob = date('Y-m-d', strtotime($data['dob']));
        $c->email = $data['email'];
        $c->password = bcrypt($data['password']);
        $c->phone = $data['phone'];
        $c->emergency_phone = $data['emergency_phone'];
        $c->address = $data['address'];
        $c->city = $data['city'];
        $c->state = $data['state'];
        $c->country = $data['country'];
        $c->postal_code = $data['postal_code'];
        $c->department_id = $data['department_id'];
        $c->designation = $data['designation'];
        $c->basic_salary = $data['basic_salary'];
        $c->joining_date = date('Y-m-d', strtotime($data['joining_date']));
        $c->save();

        return $c->id;
    }


    public static function updateImage($id, $filename){
        $i = User::find($id);
        $i->profile_img = $filename;
        $i->save();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department(){
        return $this->belongsTo(departments::class, 'department_id');
    }
}

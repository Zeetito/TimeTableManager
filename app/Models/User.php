<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ClassGroup;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'othername',
        'lastname',
        'gender',
        'identity_number',
        'index_number',
        'is_staff',
        'is_admin',
        'program_id',
        'class_group_id', 
        'email',
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


    // RELATIONSHIPS

    // User Program
    public function program(){
        return $this->class_group->program;
    }

    // Return related ClassGroup
    public function class_group(){
        return $this->belongsTo(ClassGroup::class);
    }

// Lectures

    // Return All Lectures for the Sem
    public function lectures_for($sem){
        return $this->class_group->lectures_for($sem);
    }

// Attendance
    

    // FUNCTIONS
    // Get Fullname of user
    public function fullname(){
        return $this->firstname." ".$this->othername." ".$this->lastname;
    }

    // Get Avatar
    public function get_avatar(){
        if($this->gender == 'm'){
            return asset('img/avatar/male_avatar.jpg');
        }else{
            return asset('img/avatar/female_avatar.jpg');
        }
    }


    // STATIC FUNCTIONS
    // Get All Staff
    public static function staff(){
        return self::where('is_staff',1)->get();
    }

    // Get all Students
    public static function students(){
        return self::where('is_staff',0)->get();
    }

}

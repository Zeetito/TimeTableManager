<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseLecturer extends Model
{
    use HasFactory;

    protected $fillable = [
       'course_id',
       'user_id',
    ];

    // RELATIONSSHIPS
    // User
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // return Course
    public function course(){
        return $this->belongsTo(Course::class);
    }

    // FUNCTIONS

    // STATIC FUNCTIONS
}

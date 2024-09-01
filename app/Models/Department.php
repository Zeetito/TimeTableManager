<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\College;
use App\Models\Program;
use App\Models\Classroom;
use App\Models\ClassGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'college_id',
        'faculty_id',
        'location',
    ];


// RELATIONSHIPS



    // CLASSROOMS
    // Get all classrooms
    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    // COURSES
    public function courses(){
        return $this->hasMany(Course::class);
    }

    // COLLEGE
    // Get related college          
    public function college(){
        return $this->belongsTo(College::class);
    }



    // CLASSGROUPS
    public function classgroups(){
        return ClassGroup::whereIn('program_id',$this->programs->pluck('id')->toArray())->get();
    }

    // STUDENTS

    public function students(){
        return User::get_students()->whereIn('class_group_id',$this->classgroups()->pluck('id')->toArray())->get();
    }

    // PROGRAM
    // Get all programs
    public function programs(){
        return $this->hasMany(Program::class);
    }

}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\College;
use App\Models\Program;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'college_id',
        'location',
    ];

// RELATIONSHIPS
    // COLLEGE
    // Get related college
    public function college(){
        return $this->belongsTo(College::class);
    }


    // DEPARTMENT
    // Get all related departments
    public function departments(){
        return $this->hasMany(Department::class,'faculty_id');
    }

    // COURSES
    // Get all related courses
    public function courses(){
        return Course::whereIn('department_id',$this->departments->pluck('id'))->get();
    }


    // CLASSROOMS
    // Get all related classrooms
    public function classrooms(){
        return Classroom::whereIn('department_id',$this->departments->pluck('id'))->get();

    }

    // PROGRAMS
    // Get all related programs
    public function programs(){
        return $this->hasMany(Program::class,'faculty_id');
    }

    // CLASSGROUP
        // Get all classgroups for the college
        public function classgroups(){
            return ClassGroup::whereIn('program_id',$this->programs->pluck('id')->toArray())->get();
        }

    // STUDENTS
    // Get all students
    public function students(){
        return User::get_students()->whereIn('class_group_id',$this->classgroups()->pluck('id')->toArray())->get();
    }

}


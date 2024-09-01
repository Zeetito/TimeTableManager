<?php

namespace App\Models;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];


// RELATIONSHIPS

    // COURSES
        // get courses
        public function courses(){
            return Course::whereIn('department_id',$this->departments->pluck('id'))->get();
        }

    // DEPARTMENTS
        // Get all related department
        public function departments(){
            return $this->hasMany(Department::class,'college_id');
        }

    // FACULTY
    // Get all faculties
    public function faculties(){
        return $this->hasMany(Faculty::class);
    }

    // CLASSROOMS
        public function classrooms(){
            // Get all related classrooms
            return Classroom::whereIn('department_id',$this->departments->pluck('id'))->get();
        }

    // PROGRAMS
        public function programs(){
            // Get all related programs
            return $this->hasMany(Program::class,'college_id');
        }

    // CLASSGROUPS
        // Get all classgroups for the college
        public function classgroups(){
            return ClassGroup::whereIn('program_id',$this->programs->pluck('id')->toArray())->get();
        }

    // STUDENTS
        public function students(){
            return User::get_students()->whereIn('class_group_id',$this->classgroups()->pluck('id')->toArray())->get();
        }


}

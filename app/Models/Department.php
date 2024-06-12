<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Classroom;
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
}

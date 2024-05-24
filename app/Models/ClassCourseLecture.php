<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\ClassGroupCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassCourseLecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'class_group_course_id',
    ];

    // RELATIONSHIPS
    // Get related Lecture
    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }

    // Get related ClassGroupCourse
    public function class_group_course(){
        return $this->belongsTo(ClassGroupCourse::class);
    }

    // FUNCTIONS

    // STATIC FUNCTIONS
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\ClassGroup;
use App\Models\ClassCourseLecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassGroupCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_group_id',
        'course_id',
        'user_id',//lecturer
        'semester_id',
    ];

// RELATIONSHIPS
        // Get the related Class Group
        public function class_group(){
            return $this->belongsTo(ClassGroup::class);
        }

        // Get related Course
        public function course(){
            return $this->belongsTo(Course::class);
        }

        // Get related Semster
        public function semester(){
            return $this->belongsTo(Semester::class);
        }
        // Get the lecturer
        // public function lecturer(){
        //     return $this->belongsTo(User::class);
        // }

        // Get related Class Course Lecture instance
        public function class_group_course_lectures(){
            return $this->hasMany(ClassCourseLecture::class);

            // return $this->hasOne(ClassCourseLecture::class);
        }

        // Get the related Lecture INstance
        public function lecture(){
            return Lecture::whereIn('id',$this->class_group_course_lectures->pluck('lecture_id'));
        }

        // Get lecturer(s)
        public function lecturer(){
            return $this->belongsTo(User::class,'user_id');
        }


// FUNCTIONS
        // Check if the instance has a lecturer
        public function has_lecturer(){
            return $this->lecturer == TRUE;
        }

// STATIC FUNCTIONS
        // Return instances for a particular sem
        public static function forSem($sem){
            return self::where('semester_id',$sem)->get();
        }
}

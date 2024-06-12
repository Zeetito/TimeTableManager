<?php

namespace App\Models;

use App\Models\User;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\CourseLecturer;
use App\Models\TimetableCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'department_id',
        'credit_hour',
    ];


    // RELATIONSHIPS
    // DEPARTMENT
        // Return the related Department
        public function department(){
            return $this->belongsTo(Department::class);
        }

    // FACULTY
        // Return the related Faculty
        public function faculty(){
            return $this->belongsTo(Faculty::class);
        }

    // COLLEGE
        // Return the related College
        public function college(){
            return $this->belongsTo(College::class);
        }


    // CLASSGROUP COURSE
        // Get the ClassGroup-Courses instances for a particular sem
        public function class_group_courses_for($sem){
            return $this->hasMany(ClassGroupCourse::class)->where('semester_id',$sem)->get();
        }

    // CLASSGROUP
        // Return ClassGroups For A particular Sem
        public function class_groups_for($sem){
            return ClassGroup::whereIn('id',$this->class_group_courses_for($sem)->pluck('class_group_id'))->get();
        }

    // LECTURES
        // return the related LEctures for a sem
        public function lectures_for($sem){
            return $this->hasMany(Lecture::class)->where('semester_id',$sem)->get();
            // return Lecture::where('semester_id',$sem)->
        }

    // COURSE LECTURES
        // Get courseLecture instances
        public function course_lecturers(){
            return $this->hasMany(CourseLecturer::class);
        }
    // USER
        // Get the lecturers who teach this course
        public function lecturers(){
            return User::whereIn('id',$this->course_lecturers->pluck('user_id'))->get();
        }

        // Get the students offering this course for a particular sem
        public function students_forSem($sem){
            return User::whereIn('class_group_id', $this->class_groups_for($sem)->pluck('id'))->get();
        }

        // TIMETABLECOURSE
        // Get all related timetable course for the sem
        public function timetablecourses_for($sem){
            return $this->hasMany(TimetableCourse::class,'course_id')->where('semester_id',$sem)->get();
        }


    // FUNCTIONS
    // SELF
    // returned Allowed Credit hour for a day
    public function initial_allowed_credit_hour(){
        return $this->credit_hour > 2 ? 2 : $this->credit_hour;
    }

    // USER
        // Check if course has studetns for a particular sem
        public function has_students_forSem($sem){
            return $this->students_forSem($sem)->count() > 0;
        }
    

    // STATIC FUNCTIONS
        
}

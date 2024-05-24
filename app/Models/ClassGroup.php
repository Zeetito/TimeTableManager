<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Program;
use App\Models\ClassGroupCourse;
use App\Models\ClassCourseLecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // 'slug',
        'year',
        'program_id',
        'end_year',
        'start_year',
    ];

// RELATIONSHIPS
        // Return members of the class group
        public function users(){
            return $this->hasMany(User::class);
        }

        // return related ClassGroup-Course(s) instance
        // Return All Class Group-Course instance
        public function class_group_courses(){
            return $this->hasMany(ClassGroupCourse::class);
        }

        
        // return related classGroup courses instance for a particular sem
        public function class_group_courses_for($sem){
            return $this->class_group_courses->where('semester_id',$sem);
        }

        // return attendance for A classGroup Course instance
        // public function 

        // Get all realted Class group course - Lecture relations
        public function class_course_lectures(){
            // return ClassCourseLecture::whereIn('class_group_course_id',$this->class_group_courses->pluck('id'))->get();
            return $this->hasManyThrough(ClassCourseLecture::class,ClassGroupCourse::class,'class_group_id','class_group_course_id');
        }

    // Programs
        // Get related program
        public function program(){
            return $this->belongsTo(Program::class);
        }


    // Courses

        // Get all courses Taken by the class group
        public function all_courses(){
            return Course::whereIn('id',$this->class_group_courses->pluck('course_id'))->get();
        }

        // Ge All related Courses for the Sem
        public function courses_for($sem){
            return ClassGroupCourse::where('class_group_id',$this->id)->where('semester_id',$sem)->get();
        }

    // Lectures

        // Get All related lectures
        public function all_lectures(){
            // $courses = $this->class_course_lectures->pluck('course_id');
            return Lecture::whereIn('id',$this->class_course_lectures->pluck('lecture_id'))->get();
            // return $this->hasManyThrough(Lecture::class,ClassCourseLecture::class,"lecture_id","id");
        }

        // Get all related lectues for the Sem
        public function lectures_for($sem){ 
            $courses = $this->class_group_courses->pluck('course_id');
            return Lecture::where('semester_id',$sem)->whereIn('course_id',$courses)->get();
        }

        // Get all related upcoming lectues for the Sem
        public function upcoming_lectures_for($sem){ 
            $courses = $this->class_group_courses->pluck('course_id');
            return Lecture::where('semester_id',$sem)->whereIn('course_id',$courses)->get();
        }

    // Attendance
        // Get Number of Students present for a lecture
        public function attendees_for(Lecture $lecture){
            // return $this->users;
            return User::whereIn('id',$lecture->attendees()->pluck('id'))->get();
            // return $lecture->attendees()->intersect($this->users);
            // return $this->users->intersect($lecture->attendees());
        }

        // Get number of students absent for a lecture
        public function absentees_for(Lecture $lecture){
            return User::whereIn('id',$lecture->absentees()->pluck('id'))->get();

        }



// FUNCTIONS

    // Attendance
        // Get Attendance for a ClassGroupCourse instance / Course
        public function avg_attendance_for_course(ClassGroupCourse $class_group_course){
            $sum = 0;
                foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
                $sum+=$class_group_course->class_group->attendees_for($class_group_course_lecture->lecture)->count();
                }

                return doubleval($sum/2);
        }

        // Get Average Absentance for a course
        public function avg_absentance_for_course(ClassGroupCourse $class_group_course){
            $sum = 0;
            foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
            $sum+=$class_group_course->class_group->absentees_for($class_group_course_lecture->lecture)->count();
            }

            return doubleval($sum/2);
        }

        // Maximum attendance for a particular course
        public function max_attendance_for_course(ClassGroupCourse $class_group_course){
            $values = [];
            foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
            $values[]=$class_group_course->class_group->attendees_for($class_group_course_lecture->lecture)->count();
            }
            // return $values;
            return max($values);
        }

        // Min Attendance For a particular course
        public function min_attendance_for_course(ClassGroupCourse $class_group_course){
            $values = [];
            foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
            $values[]=$class_group_course->class_group->attendees_for($class_group_course_lecture->lecture)->count();
            }
            // return $values;
            return min($values);
        }

        // Maximum attendance for a particular course
        public function max_absentance_for_course(ClassGroupCourse $class_group_course){
            $values = [];
            foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
            $values[]=$class_group_course->class_group->absentees_for($class_group_course_lecture->lecture)->count();
            }
            // return $values;
            return max($values);
        }

        // Min attendance for a particular course
        public function min_absentance_for_course(ClassGroupCourse $class_group_course){
            $values = [];
            foreach ($class_group_course->class_group_course_lectures as $class_group_course_lecture){
            $values[]=$class_group_course->class_group->absentees_for($class_group_course_lecture->lecture)->count();
            }
            // return $values;
            return min($values);
        }


// STATIC FUNCTIONS

}

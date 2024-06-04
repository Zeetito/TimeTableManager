<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\ClassGroup;
use App\Models\AttendanceUser;
use App\Models\ClassGroupCourse;
use App\Models\ClassCourseLecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lecturer_id',
        'is_tutorial',
        'semester_id',
        'start_time',
        'end_time',
        'classroom_id',
        'status',
    ];

// RELATIONSHIPS
        // Get the related course
        public function course(){
            return $this->belongsTo(Course::class);
        }

        // Get the related lecturer
        public function lecturer(){
            return $this->belongsTo(User::class,'user_id');
        }

        // GEt all ClassGroups , Courses and Lecture Instances
        public function class_group_course_lectures(){
            return $this->hasMany(ClassCourseLecture::class);
        }

        // Get related Class Group and Course INstances
        public function class_group_courses(){
            return ClassGroupCourse::whereIn('id',$this->class_group_course_lectures->pluck('class_group_course_id'))->get();
            // return $this->hasManyThrough(ClassGroupCourse::class,ClassCourseLecture::class,"class_group_course_id","id");
        }

        // Get the related ClassGroups
        public function class_groups(){

            return ClassGroup::whereIn('id',$this->class_group_courses()->pluck('class_group_id'))->get();
            
            // return ClassGroup::whereHas('class_group_courses', function ($query)  {
            //     $query->whereIn('id',$this->class_group_courses->pluck('id'));
            //     })->get()
            //     ;
            // return $this->hasManyThrough(ClassGroup::class,ClassCourseLecture::class,"class_group_course_id","id");
        }

        // Get Expected Attendees
        public function expected_attendees(){
            return User::whereIn('class_group_id',$this->class_group_courses()->pluck('class_group_id'))->get();
        }

        // Get Those who actually attended
        public function attendees(){
            $ids = $this->hasManyThrough(AttendanceUser::class, Attendance::class)->pluck('user_id');
            return User::whereIn('id',$ids)->get();
        }

        // Get absentees for a Lecture
        public function absentees(){
            return $this->expected_attendees()->diff($this->attendees());
        }

        // Get related attendance Session
        public function attendance(){
            return $this->hasOne(Attendance::class);
        }

    // Classroom
    public function classroom(){
        return $this->belongsTo(Classroom::class,);
    }

// FUNCTIONS
    
// STATIC FUNCTIONS
        // Get Lectures for a particular Semster
        public static function forSem($sem){
            return self::where('semester_id',$sem)->get();
        }

        // Get lectures with attendance_users instances
        public static function with_attendees(){

        }

        // Get lectures with attendance instance
        public static function with_attendance_instance(){
            
        }

        // Get lectures grouped by Week for a sem
        public static function getLecturesGroupedByWeek($sem)
        {
            // Fetch lectures for the given semester
            $lectures = self::forSem($sem);

            // Group by week
            $groupedLectures = $lectures->groupBy(function ($lecture) {
                // Get the start of the week (Sunday) for the lecture date
                return Carbon::parse($lecture->date)->startOfWeek()->format('Y-m-d');
            });

            return $groupedLectures;
        }

}

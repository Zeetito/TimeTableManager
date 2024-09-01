<?php

namespace App\Models;

use App\Models\Course;
use App\Models\College;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\Timetable;
use App\Models\ClassGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimetableCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'semester_id',
        'day',
        'classroom_id',
        'start_time',
        'end_time',
        'user_id',
    ];

    const START_TIMES = ['8:00:00' , '9:00:00', '10:30:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00'];
    const END_TIMES = ['8:55:00', '9:55:00', '10:25:00', '12:25:00', '13:55:00', '14:55:00', '15:55:00', '16:55:00', '17:55:00', '18:55:00'];

// RELATIONSHIPS

    // COURSE
    // Get the related course
    public function course(){
      return  $this->belongsTo(Course::class);
    }

    // SEMESTER
    // Get related semester
    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }

    // CLASSROOM
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    // COLLEGE
    public function college(){
        return $this->course->college;
    }

// FUNCTIONS


// STATIC FUNCTIONS
    // SELF
    //  Get all self instances that occur on a particular day of the sem
    public static function scheduled_for($day,$sem){
        return self::forSem($sem)->where('day',$day);
    }
    
    // Self instances for the sem
    public static function forSem($sem){
        return self::where('semester_id',$sem);
    }

    // Clashing courses based on classroom_day_start_time
    public static function clashing($sem){
        // return clashing_timetable_courses($sem);
       $clashing_classgroups = ClassGroup::with_clashing_courses($sem);

       $clashing_time_table_courses = self::whereIn('class_group_id',$clashing_classgroups->pluck('id'))->where('day',1);
    }

}

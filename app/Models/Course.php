<?php

namespace App\Models;

use DateTime;
use App\Models\User;
use App\Models\Course;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Department;
use App\Models\CourseLecturer;
use App\Models\TimetableCourse;
use App\Models\ClassGroupCourse;
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
            return $this->department->college;
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
            return $this->hasMany(TimetableCourse::class,'course_id')->where('semester_id',$sem);
        }

        // Get related timetable courses for a day of the sem
        public function timetablecourses_on($day, $sem){
            return $this->timetablecourses_for($sem)->where('day',$day);
        }


    // FUNCTIONS
    // SELF
    // returned Allowed Credit hour for a day
    public function allowed_credit_hour($sem){
        $assigned_credit_hour = $this->hasMany(TimetableCourse::class,'course_id')->where('semester_id',$sem)->pluck('duration')->sum();
        $rem = $this->credit_hour - $assigned_credit_hour;
        if($rem > 2){
            $duration = 2;
        }else{
            $duration = $rem;
        }
        return $duration;
        // return $this->credit_hour > 2 ? 2 : $this->credit_hour;
    }

    // Check available days for a course to be assigned
    public function available_days($sem){

        $days = [];

        $classgroups = $this->class_groups_for($sem);

        for($i =1; $i<6; $i++){
            $query = Classgroup::timetable_courses_for_classgroups($classgroups->pluck('id')->toArray(),$i,$sem);

            if($query[0] == false){
                $days[] = $i;
            }else{
                continue;
            }

        }

        return $days;



        // $query = Classgroup::timetable_courses_for_classgroups($classGroupIds,$sem);
        // return $query;
    }
    // Get available start_times for a course to be assigned in html form
    public function html_available_start_times_on($day,$sem,$duration,$timetable_course){

        // $start_times = [];

        $classgroups = $this->class_groups_for($sem);
        $classgroupIds = $this->class_groups_for($sem)->pluck('id')->toArray();

        // for($i =1; $i<6; $i++){
        $query = Classgroup::timetable_courses_for_classgroups($classgroupIds,$day,$sem);

        $start_times = $query[1]->unique('start_time')->pluck('start_time');

        // }
        // Set the number of minutes to add
        $minutesToAdd = (($duration*60)-5) ; // You can change this value dynamically

        // Initialize an empty array to hold the new pairs
        $newTimes = [];

        // Loop through each time in the original array
        foreach ($start_times as $time) {
            // Create a DateTime object from the current time
            $dateTime = new DateTime($time);
            
            // Clone the DateTime object to avoid modifying the original
            $dateTimePlusDynamicMinutes = clone $dateTime;
            
            // Add the specified number of minutes
            $dateTimePlusDynamicMinutes->modify("+$minutesToAdd minutes");
            
            // Create the pair as "original time - new time"
            $pair = $time . " - " . $dateTimePlusDynamicMinutes->format('H:i:s');
            
            // Add the pair to the new array
            $newTimes[] = $pair;
        }
        $newTimes;

       // Generate the HTML for the select element
       $availableTimesHtml = '<option value="">Select Available Time</option>';

        foreach ($newTimes as $index => $newTime) {
        $availableTimesHtml .= '<option value="' . $start_times[$index] . '">' . $newTime . '</option>';
        }

        // $availableTimesHtml .= '</select>';

        return $availableTimesHtml;


    }

    // Get available start times on particular day
    public function available_times_on($day,$sem,$duration,$timetable_course){
              // $start_times = [];

              $classgroups = $this->class_groups_for($sem);
              $classgroupIds = $this->class_groups_for($sem)->pluck('id')->toArray();
      
              // for($i =1; $i<6; $i++){
              $query = Classgroup::timetable_courses_for_classgroups($classgroupIds,$day,$sem);
      
              $start_times = $query[1]->unique('start_time')->pluck('start_time');
      
              // }
              // Set the number of minutes to add
              $minutesToAdd = (($duration*60)-5) ; // You can change this value dynamically
      
              // Initialize an empty array to hold the new pairs
              $end_times = [];
      
              // Loop through each time in the original array
              foreach ($start_times as $time) {
                  // Create a DateTime object from the current time
                  $dateTime = new DateTime($time);
                  
                  // Clone the DateTime object to avoid modifying the original
                  $dateTimePlusDynamicMinutes = clone $dateTime;
                  
                  // Add the specified number of minutes
                  $dateTimePlusDynamicMinutes->modify("+$minutesToAdd minutes"); 
                  
                  // Add the pair to the new array
                  $end_times[] = $dateTimePlusDynamicMinutes->format('H:i:s');
              }
      
            return [$start_times,$end_times];
    }

    
    // CLASSROOM
    // Get available classroom for a particular day at a particular time
    public function html_available_classrooms_on($day,$sem,$start_time,$timetable_course){
       $timetable_courses =  TimetableCourse:: scheduled_for($day,$sem)->where('start_time',$start_time)->get();
       $occupied_classroom = $timetable_course->pluck('classroom_id')->toArray();
       $targets = $timetable_course->course->department->classrooms->whereNotIn('id',$occupied_classroom);

        // Generate the HTML for the select element
        $availableClassroomHtml = '<option value="">Select Available Classroom</option>';

        foreach ($targets as $index => $target) {
        $availableClassroomHtml .= '<option value="' . $target->id . '">' . $target->name . '</option>';
        }

       return $availableClassroomHtml;
    }

    // USER
        // Check if course has studetns for a particular sem
        public function has_students_forSem($sem){
            return $this->students_forSem($sem)->count() > 0;
        }
    

    // STATIC FUNCTIONS
    // Get courses that have classgroups offering for a sem
    public static function being_offered($sem){
        return Course::whereIn('id',ClassGroupCourse::where('semester_id',$sem)->pluck('course_id'))->get();   
    }

    // Check courses that have been fully assigned on the timetable
    public static function fully_assigned($sem){
        return Course::whereIn('id', function($query) use ($sem) {
            $query->select('tc.course_id')
                  ->from('timetable_courses as tc')
                  ->join('courses as c', 'c.id', '=', 'tc.course_id')
                  ->where('tc.semester_id', $sem)
                  ->groupBy('tc.course_id')
                  ->havingRaw('SUM(tc.duration) = (SELECT credit_hour FROM courses WHERE id = tc.course_id)');
        })->get();
    }

    // Get partially assigned courses
    public static function partially_assigned($sem){
        return Course::whereIn('id', function($query) use ($sem) {
            $query->select('tc.course_id')
                  ->from('timetable_courses as tc')
                  ->join('courses as c', 'c.id', '=', 'tc.course_id')
                  ->where('tc.semester_id', $sem)
                  ->groupBy('tc.course_id')
                  ->havingRaw('SUM(tc.duration) < (SELECT credit_hour FROM courses WHERE id = tc.course_id)');
        })->get();
    }

    // Check Courses that are not fully assigned + those not asigned at all
    public static function not_fully_assigned($sem){
        return self::being_offered($sem)->diff(self::fully_assigned($sem));
    }
    
    // Get courses that have not been even partially assigned
    public static function non_assigned($sem){
        // dd(self::fully_assigned($sem)->count());
        $allocated =  self::fully_assigned($sem)->union(self::partially_assigned($sem));
        return self::being_offered($sem)->diff($allocated);
    }

    // Check percentage completed allocations for the sem
    public static function percent_complete_allocation(Semester $sem){
        $val = ((self::fully_assigned($sem->id)->count() / self::being_offered($sem->id)->count()) * 100);
        return number_format((float)$val, 2, '.', '');
    }

    // Check if courses have been fully assigned for the semester
    public static function fully_assigned_forSem($sem){
        return self::fully_assigned($sem)->count() == self::being_offered($sem)->count();
    }


        
}

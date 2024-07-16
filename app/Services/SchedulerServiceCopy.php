<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\TimetableCourse;
use Illuminate\Support\Collection;
use Illuminate\Database\QueryException;



class SchedulerServiceCopy
{
    // 1st
    // Shcedule timetable for the entire semester
    public static function scheduleTimetable_forSem(Semester $semester ){

          // Increase maximum execution time to 5 minutes
          ini_set('max_execution_time', 3600); // 1 Hour
          ini_set('memory_limit', '512M'); // Sets the memory limit to 512 MB

        // Creating an array unassigned, to keep track of the number of unassigned courses after each iteration to 
        // know a value repeated twice which means the code cannot allocate any suitable variables for the remaingin courses
        $unassigned = [];
        // Stash is a variable that determines whether or not the courses should be stashed as they are if suitable allocations are not found
        $stash = false;

        $sem =  $semester->id;

        // Get the courses that are not fully assigned
        $not_fully_assigned_query = Course::not_fully_assigned($sem);



        // If all courses are fully assigned and or stashed
        if($not_fully_assigned_query->count() == 0){

            // Check if the number of unassigned courses is greater than Zero
            // Our work here is done
        }else{
            // Check if the number of unassigned has repeated after another iteration of the function
            //That would mean the code is not able to allocate a suitable time, day or classroom for the course
            if($not_fully_assigned_query->count() == end($unassigned)){
                // Global variable stash true, would sotre the instances as they are
                $stash = true;
            
            }else{
                $unassigned[] = $not_fully_assigned_query->count();
            }
        }

    
        // Check if there're courses that are not fully assigned in the system

        // For each Semester and Foreach course, check if the course has students offering for that sem

        // Using Chunk Method
        // $not_fully_assigned_query->chunk(5, function($not_fully_assigned) {
            foreach($not_fully_assigned_query as $course){
                $students = $course->students_forSem($sem);
                $classgroups = $course->class_groups_for($sem);
                $classgroup_ids = $classgroups->pluck('id')->toArray();
                $class_size = $students->count();
                $credit_hour = $course->allowed_credit_hour($sem);            

                // Check if there are students for this course this year
                if($students->count() > 0){
                    $classrooms = self::get_best_classrooms_for_course($course,$students,$class_size);
                    $classrooms_ids = $classrooms->pluck('id')->toArray();
                }else{
                    // If not, move on to the next Course
                    continue;
                }

                // dd("massa");

            
                // Classrooms Secured

                
                // Assign the best day for the course to a variable
                $best_day_and_classrooms = self::get_best_day_for_course($classgroup_ids,$course,$sem,$classrooms_ids);
                $best_day = $best_day_and_classrooms[0];
                $available_classrooms =  $best_day_and_classrooms[1];

                // Check for which of the classrooms are free and assign at a particular point in time and assign the class
                $class_occupied_periods = Classroom::periods_occupied($available_classrooms,$sem);


                // Assign the best time for the course, considering the classrooms and and classgroups and Lecturers
                $best_times = self::get_best_time_for_course($course, $class_occupied_periods,$best_day,$sem,$credit_hour,$available_classrooms, $classgroup_ids);
                
                // Assign value to variables
                $best_start_time = $best_times[0];
                $best_end_time = $best_times[1];
                $best_classroom = $best_times[2];


                // if one of the Three variables is not known and stash is false skip the course
                // dd($best_classroom);
                if($best_start_time == null || $best_end_time == null || $best_classroom == null){
                    if($stash == false){
                        continue;
                    }
                    // Else, Stash
                }

                


                // if none is null or stash is true, it'd create the instance with the variables (null, inclusive)

                // Create A Timetable course INstance with the collected variables
                $instance = new TimetableCourse;
                $instance->course_id = $course->id;
                $instance->semester_id = $sem;
                $instance->day = $best_day;
                $instance->duration = $credit_hour;
                $instance->classroom_id = $best_classroom;// integer
                $instance->start_time = $best_start_time;
                $instance->end_time = $best_end_time;
                $instance->user_id = $course->lecturers()->count() > 1 ? null : $course->lecturers()->first()->id;
                // dd($instance);
                
                try {
                    // Attempt to insert a new record
                    $instance->save();
                   
                } catch (QueryException $e) {
                    // Check if the exception is due to a unique constraint violation
                    if ($e->getCode() == 23000) {
                        continue;
                    } else {
                        // Handle other types of database exceptions
                        echo "An unexpected database error occurred: " . $e->getMessage();
                    }
                }
                



            }
        // });

        // Exit the function if Stash is True since all unallocated courses are stashed
        if($stash == true){
            return;
        }
        return self::scheduleTimetable_forSem($semester);

    }


    // Functions
    // Return day which works for a the classgroups and the Lecturer(s) of a particular course
    public static function get_best_day_for_course(array $classgroup_ids,$course,$sem, array $classrooms_ids){
        // Foreach WeekDay,  Monday = 1, sunday =0 using Carbon::createFormDate(y,m,d)
        for($i = 1; $i<=5; $i++){
            $day_is_okay = false;
            
            // First Check if any of the involved classgroups has exceeded 6 hours for the day
            foreach($classgroup_ids as $classgroup_id){
                if(ClassGroup::find($classgroup_id)->timetable_scheduled_for($i,$sem)->pluck('duration')->sum() > 6 ){
                    $day_is_okay = false;
                    break; //Break out of the foreach Loop
                }else{
                    // If a day fits
                    $day_is_okay = true;
                    $day = $i;
                    break; // Exit the foreach classgroup loop for number of hours
                }
            }

          
               
            // Check if Day is Okay for lecturer(s)
            // Check foreach of the Lecturer(s) of the course if the day is favorable
            foreach($course->course_lecturers as $lecturer_instance){
                if($lecturer_instance->user->staff_timetable_schedule_for($i,$sem)->pluck('duration')->sum() > 6 ){
                    $day_is_okay = false;
                    break;
                }else{
                    $day_is_okay = true;
                    $day = $i;
                    break;
                }
            }

            // // Check all available classrooms  and store in array
            $classrooms = [];
            foreach($classrooms_ids as $classroom_id){
                if(Classroom::find($classroom_id)->timetable_schedule_for($i,$sem)->pluck('duration')->sum() > 6 ){
                    $day_is_okay = false;
                    continue;
                }else{
                    $day_is_okay = true;
                    $day = $i;
                    // $best_class = $classroom_id;
                    $classrooms[] = $classroom_id;
                    // break 2;
                }
            }
            // Check if the available classrooms dey
            if(count($classrooms)  > 0){
                break;
            }



 

        }

        return [$day,$classrooms];
    }
    // Get best classroom for course
    public static function get_best_classrooms_for_course(Course $course,$students,$class_size){
            // Check for Classroom in the department / faculty or college 
            // of the course to find a classroom capable of accomodatiing the class size
            $classrooms = $course->department->classrooms->where('reg_cap', '>=', $class_size);

            // check faculty level
            if(!$classrooms){
                $classrooms = $course->faculty->classrooms->where('reg_cap', '>=', $class_size);
            }

            // check college level
            if(!$classrooms){
                $classrooms = $course->college->classrooms->where('reg_cap', '>=', $class_size);
            }

            // check all classrooms
            if(!$classrooms){
                $classrooms = Classroom::where('reg_cap', '>=', $class_size);
            }

            return $classrooms;

    }

    // Get best time for the course WITH THE BEST CLASSROOMS AS WELL
    public static function get_best_time_for_course(Course $course,array $class_occupied_periods,$best_day,$sem,$credit_hour,array $available_classrooms, array $classgroup_ids){
        $daysOfTheWeek = [1,2,3,4,5];

        $available_classrooms = $class_occupied_periods[0];
        $classroom_occupied_days = $class_occupied_periods[1];
        $classroom_start_times = $class_occupied_periods[2];
        $classroom_end_times = $class_occupied_periods[3];
        // First Get the Classroom out of the array, whose free days coincide with the best day

        // dd($classroom_start_times);
        // Check for each of the occupied days of a classroom
        foreach($classroom_occupied_days as $index=>$days){
            $days = array_unique($days);
            // Check if the best day is in the free days
            if(in_array($best_day, array_diff($daysOfTheWeek, $days) )){
                $best_classroom = $available_classrooms[$index];
                $possible_best_start_times = array_diff(TimetableCourse::START_TIMES,$classroom_start_times[$index] );
                $possible_best_end_times = array_diff(TimetableCourse::END_TIMES,$classroom_end_times[$index] );

                break;
            }else{
                continue;
            }
        }

        // Check which of the time pairs fits
        // Get all courses for the classroom on that day
        $course_timetable_courses = TimetableCourse::scheduled_for($best_day,$sem)->where('classroom_id',$best_classroom);
        $time_is_okay = false;
        $best_start_time = null;
        $best_end_time = null;
        foreach($possible_best_start_times as $initial_start_time){

            foreach($possible_best_end_times as $initial_end_time){
                $time_start_time = Carbon::createFromFormat('H:i:s', $initial_start_time);
                $time_end_time = Carbon::createFromFormat('H:i:s', $initial_end_time);

                // Check if start time is less than end time and the diff between the time is equal to the credit hour
                if($time_start_time->lessThan($time_end_time) && round(($time_start_time->diffInMinutes($time_end_time))/60) == $credit_hour  ){
                   
                    // The Pair here is a suitable time
                    // Check this time against the Courses
                    // dd($course_timetable_courses->where('start_time','>=',$initial_start_time)->where('end_time','<=',$initial_end_time))->count();
                    if($course_timetable_courses->where('start_time','<',$initial_end_time)->where('end_time','>',$initial_start_time)->count() > 0){
                        // Move on to the Next StartTime
                       continue 2 ;
                    }else{

                            // Check if the times are okay for the classgroups involved
                            foreach($classgroup_ids as $classgroup_id){
                                if(ClassGroup::find($classgroup_id)->timetable_scheduled_for($best_day,$sem)->where('start_time','<',$initial_end_time)->where('end_time','>',$initial_start_time)->count() > 0){
                                    $time_is_okay = false;
                                    continue 3;
                                    //break to different start time
                                }
                            }
                        
                            // Check if the time is okay for the lecturers
                            foreach($course->course_lecturers as $course_lecturer){
                                // if($course_lecturer->user->staff_timetable_schedule_for($best_day,$sem)->whereBetween('start_time',[$best_end_time,$best_end_time])->orWhereBetween('end_time',[$best_end_time,$best_end_time])->count() > 0){
                                if($course_lecturer->user->staff_timetable_schedule_for($best_day,$sem)->where('start_time','<',$initial_end_time)->where('end_time','>',$initial_start_time)->count() > 0){
                                    $time_is_okay = false;
                                    continue 3 ;
                                }else{
                                    $best_start_time = $initial_start_time;
                                    $best_end_time = $initial_end_time;
                                    $time_is_okay = true;
                                    break 3;
                                }
                            }

                    }


                }else{
                   continue;
                }

            }

            // echo "skip_all ";

        }
        // dd($best_start_time);
           // return the start and endtimes with the best classroom
            return [$best_start_time,$best_end_time,$best_classroom];
        
    }
    


}

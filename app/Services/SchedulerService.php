<?php
// 1st
namespace App\Services;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\User;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\TimetableCourse;
use Illuminate\Support\Collection;
use Illuminate\Database\QueryException;



class SchedulerService
{
    // 2nd
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
            foreach($not_fully_assigned_query->take(24) as $course){
                $students = $course->students_forSem($sem);
                $classgroups = $course->class_groups_for($sem);
                $classgroup_ids = $classgroups->pluck('id')->toArray();
                $class_size = $students->count();
                $credit_hour = $course->allowed_credit_hour($sem);
                
                $lecturers_id = $course->course_lecturers->pluck('id')->toArray();

                // Check if there are students for this course this year
                if($students->count() > 0){
                    $classrooms = Classroom::get_best_classrooms_for_course($course,$class_size);
                    
                    // Check if classrooms are 0
                    if($classrooms->count() < 1){
                        $classrooms = Classroom::where('max_cap', '>=', 400)->get();
                    }
                    
                    $classrooms_ids = $classrooms->pluck('id')->toArray();
                    // dd($classrooms->pluck('id'));
                }else{
                    // If not, move on to the next Course
                    continue;
                }

            

               
                
                // --------------------------------------------------------
                $best_day = null;
                $best_classroom = null;
                // Forall the Days of the Week
                for($i = 1; $i<=5; $i++){
                    // All timetable courses instances for the day
                    $timetable_courses_for_day = TimetableCourse::scheduled_for($i,$sem);
                    
                    // Get the related timetablecourse for the related classgroups and if feasible or not
                    $timetable_courses_for_classgroups = ClassGroup::timetable_courses_for_classgroups($classgroup_ids,$i,$sem);
                    
                    // Get the related timetablecourse for the related Lecturers
                    $timetable_course_for_lecturers =  User::timetable_courses_for_lecturers($lecturers_id,$i,$sem);


                    // if any of the classgroup or lectureres instances for that day exceeds 6 hours move to next day
                    if($timetable_courses_for_classgroups[0] == true || $timetable_course_for_lecturers[0] == true){
                        // Move to next day
                        continue;
                    }



                    // It it passes the Duration Test,
                    $best_day = $i;
                    
                    // Merge Classgroup and Lecturers timetablecourse
                    $merged = $timetable_courses_for_classgroups[1]->merge($timetable_course_for_lecturers[1])->unique();

                    
                    // Get the occupied start and end times 
                    $merged_number = $merged->count();

                    // Ensuring that none of the times overlaps
                    $start_times = $merged->pluck('start_time')->unique();
                    $end_times = $merged->pluck('end_time')->unique();

                    $start_times_count = $start_times->count();
                    $end_times_count = $end_times->count();

                    // Check for overlapping times
                    if($start_times_count != $merged_number || $end_times_count !=  $merged_number){
                        // Move on to the Next Day
                        continue;
                    }

                    // dd([[[$start_times_count,$merged_number],[$end_times_count,$merged_number]]]);

                    // If the overlapping test is passed
                    $available_start_times = array_diff(TimetableCourse::START_TIMES,$start_times->toArray());
                    $available_end_times = array_diff(TimetableCourse::END_TIMES,$end_times->toArray());

                    $best_start_time = null;
                    $best_end_time = null;
                    $time_is_okay = false;


                    // Loop through the times to find the most fitting
                    foreach($available_start_times as $start_time){
                        
                        foreach($available_end_times as $end_time){
                            $time_start_time = Carbon::createFromFormat('H:i:s', $start_time);
                            $time_end_time = Carbon::createFromFormat('H:i:s', $end_time);


                            if($time_start_time->lessThan($time_end_time) && round(($time_start_time->diffInMinutes($time_end_time))/60) == $credit_hour  ){
                                $best_start_time = $start_time;
                                $best_end_time = $end_time;
                                $time_is_okay = true;
                                break 2;
                                // End Foreach: Search
                            }else{
                                // Skip to next end time
                                continue;
                            }
                            
                        }
                    }

                    if($time_is_okay == false){
                        continue;
                        // Move to Next Day;
                    }


                    // Best Start and End times gotten

                    // Get the best classrooms available at these times
                    $available_classrooms = Classroom::available_besides_time($classrooms_ids, $best_start_time,$best_end_time,$best_day,$sem);

                    $best_classroom =  $available_classrooms[0];

                    // dd($classrooms_ids);

                }

                // dd($timetable_course_for_lecturers);


                // ----------------------------------------------------------

                // dd([$best_start_time, $best_end_time, $best_classroom, $best_day]);
                // if none is null or stash is true, it'd create the instance with the variables (null, inclusive)
                if($best_start_time == null || $best_end_time == null || $best_classroom == null || $best_day == null){
                    if($stash == false){
                        continue;
                    }
                    // Else, Stash
                }


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
                // dd(collect($instance)->values());
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
        echo"here ";
        return self::scheduleTimetable_forSem($semester);

    }


    // Functions

    // Get best classroom for course
    // public static function get_best_classrooms_for_course(Course $course,$students,$class_size){
    //         // Check for Classroom in the department / faculty or college 
    //         // of the course to find a classroom capable of accomodatiing the class size
    //         $classrooms = $course->department->classrooms->where('reg_cap', '>=', $class_size);

    //         // check faculty level
    //         if(!$classrooms){
    //             $classrooms = $course->faculty->classrooms->where('reg_cap', '>=', $class_size);
    //         }

    //         // check college level
    //         if(!$classrooms){
    //             $classrooms = $course->college->classrooms->where('reg_cap', '>=', $class_size);
    //         }

    //         // check all classrooms
    //         if(!$classrooms){
    //             $classrooms = Classroom::where('reg_cap', '>=', $class_size);
    //         }

    //         return $classrooms;

    // }

    


}

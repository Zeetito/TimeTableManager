<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\TimetableCourse;
use Illuminate\Support\Collection;



class SchedulerService
{
    // Shcedule timetable for the entire semester
    public function scheduleTimetable_forSem(Semester $semester)
    {
        $sem =  $semester->id;

        // 1. For each Semester and Foreach course, check if the course has students offering for that sem
        foreach(Course::all() as $course){
            $students = $course->students_forSem($sem);
            $classgroups = $course->class_groups_for($sem);
            $classgroup_ids = $classgroups->pluck('id');
            $class_size = $students->count();
            $credit_hour = $course->initial_allowed_credit_hour();            

            // Check if there are students for this course this year
            if($students->count() == 0){
                $classrooms = $this->get_best_classroom_for_course($course,$students,$class_size);
            }else{
                // If not, move on to the next Course
                continue;
            }
         
            // Classrooms Secured

            // Check for which of the classrooms are free and assign at a particular point in time and assign the class
            $class_occupied_periods = Classroom::periods_occupied($classrooms->pluck('id'),$sem);

            // Assign the best day for the course to a variable
            $best_day = $this->get_best_day_for_course($classgroup_ids,$sem);

            // Assign the best time for the course, considering the classrooms and and classgroups and Lecturers
            $best_times =  $this->get_best_time_for_course($course, $class_occupied_periods,$best_day,$sem,$classgroup_ids);
            
            // Assign value to variables
            $best_start_time = $best_times[0];
            $best_end_time = $best_times[1];
            $best_classroom = $best_time[2];



            // Create A Timetable course INstance with the collected variables
            $instance = new TimetableCourse;
            $instance->course_id = $course->id;
            $instance->semester_id = $sem;
            $instance->day = $best_day;
            $instance->duration = $credit_hour;
            $instance->classroom_id = $best_classroom;// integer
            $instance->start_time = $best_start_time;
            $instance->end_time = $best_end_time;
            $instance->user_id = $course->lecturers()->count > 1 ? null : $course->lecturers()->first()->id;

            $instance->save();



        }


    }

    // Functions
    // Return day which works for a the classgroups and the Lecturer(s) of a particular course
    public function get_best_day_for_course(array $classgroup_ids,$sem){
        // Foreach WeekDay,  Monday = 1, sunday =0 using Carbon::createFormDate(y,m,d)
        for($i = 1; $i<=5; $i++){
            // First Check if any of the involved classgroups has exceeded 8 hours for the day
            $day_instances = TimetableCourse::scheduled_for($i,$sem);
            $day_is_okay = false;

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

             // If the day is not okay, skip to the next day
            if (!$day_is_okay) {
                continue; // Move on to next day
            }else{
                // if yes
                // Check if Day is Okay for lecturer(s)
                // Check foreach of the Lecturer(s) of the course if the day is favorable
                    foreach($course->course_lecturers as $lecturer){
                        if($lecturer->staff_timetable_schedule_for($i,$sem)->pluck('duration')->sum() > 6 ){
                            $day_is_okay = false;
                            break;
                        }else{
                            $day_is_okay = true;
                            $day = $i;
                            break;
                        }
                    }
            }

        }

        return $day;
    }
    // Get best classroom for course
    public function get_best_classroom_for_course(Course $course,$students,$class_size){
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
    public function get_best_time_for_course(Course $course,array $class_occupied_periods,$best_day,$sem,$classgroup_ids){
        // Days of the Week
        $daysOfTheWeek = [1,2,3,4,5];
        // First Get the Classroom out of the array, whose free days coincide with the best day
        $classroom_ids = $class_occupied_periods[0];
        $classroom_occupied_days = $class_occupied_periods[1];
        $classroom_start_times = $class_occupied_periods[2];
        $classroom_end_times = $class_occupied_periods[3];

        // Check for each of the freedays of a classroom
        foreach($classroom_occupied_days as $index=>$day){
            
            // Check if the best day is in the free days
            if(in_array($best_day, array_diff($daysOfTheWeek, $day) )){
                $best_classroom = $classroom_ids[$index];
                $possible_best_start_times = array_diff(TimetableCourse::START_TIMES,$occupied_start_times[$index] );
                $possible_best_end_times = array_diff(TimetableCourse::END_TIMES,$occupied_end_times[$index] );
                break;
            }else{
                continue;
            }
        }

        // Check now each of the possible start times which one is best fitting
        $course_timetable_courses = $course->timetablecourses_for($sem)->where('day',$best_day);
        foreach($possible_best_start_times as $start_time){
            
            // Compare each start time against end time
            foreach($possible_best_end_times as $end_time){
                
                if($course_timetable_courses->whereBetween('start_time',[$start_time,$end_time])->count() > 0){
                    $start_time = Carbon::createFromTimeString($start_time);
                    $end_time = Carbon::createFromTimeString($end_time);

                    if(round(($start_time->diffInMinutes($end_time))/60) == $course->initial_allowed_credit_hour()){
                        $best_start_time = $start_time;
                        $best_end_time = $end_time;

                            // Check if the times are okay for the classgroups involved
                            $time_is_okay = false;
                            foreach($classgroup_ids as $classgroup_id){
                                if(ClassGroup::find($classgroup_id)->timetable_scheduled_for($best_day,$sem)->whereBetween('start_time',[$start_time,$end_time])->whereBetween('end_time',[$start_time,$end_time])->count() > 0){
                                    $time_is_okay = false;
                                    break;
                                }else{
                                    $time_is_okay = true;

                                    // Check if the time is okay for the lecturers
                                    foreach($course->course_lecturers as $lecturer){
                                        if(staff_timetable_schedule_for($best_day,$sem)->whereBetween('start_time',[$best_end_time,$best_end_time])->whereBetween('end_time',[$best_end_time,$best_end_time])->count() > 0){
                                            $time_is_okay = false;
                                            break 2;
                                        }
                                    }

                                }
                            }

                        // break;
                    }

                }

                if($time_is_okay){
                    break;
                }
                
            }

            if($best_start_time && $best_end_time){
                break;
            }

        }

        // return the start and endtimes with the best classroom
        return [$best_start_time,$best_end_time,$best_classroom];


    }
    

}

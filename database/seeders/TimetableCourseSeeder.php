<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Semester;
use App\Models\TimetableCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimetableCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $semester = Semester::active_semester();
        $sem = $semester->id;

        if(Course::not_fully_assigned($sem)->count() == 0){
            return;
        }

        $starttimes = TimetableCourse::START_TIMES;

        
        // Seed for all the taken courses
        while(Course::not_fully_assigned($sem)->count() > 0){

            foreach(Course::not_fully_assigned($sem) as $course){

                $rand = array_rand($starttimes);            
                $credit_hour = $course->allowed_credit_hour($sem);
                if( $credit_hour == 0){
                    break;
                }
                
                $start_time = $starttimes[$rand];

                
                $tc = new TimetableCourse;
                $tc->course_id = $course->id;
                $tc->semester_id = $sem;
                $tc->day = rand(1,5);
                $tc->duration = $credit_hour;
                $tc->classroom_id = $course->department->classrooms->random()->id;
                $tc->start_time = $start_time;


                $tc->end_time = $credit_hour == 1 
                    ? Carbon::createFromFormat('H:i:s', $start_time)->addHour()->format('H:i:s') 
                    : Carbon::createFromFormat('H:i:s', $start_time)->addHours(2)->format('H:i:s');
                    
                $tc->user_id = $course->lecturers()->random()->id;

                try {
                    // Attempt to insert a new record
                    $tc->save();
                
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
            
        }



    }
}

<?php

namespace Database\Seeders;

use DateTime;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Function to get random times between a range
        function getRandomTime($minTime, $maxTime) {
            // Convert start and end times to timestamps
            $minTimestamp = strtotime($minTime);
            $maxTimestamp = strtotime($maxTime);
        
            // Generate a random timestamp between start and end times
            $randomTimestamp = mt_rand($minTimestamp, $maxTimestamp);
        
            // Convert the random timestamp back to a formatted time string
            return date('H:i:s', $randomTimestamp);
        }

        $minTime = '08:00:00';
        $maxTime = '19:00:00';


        // Function To Add Hours to Time
        function addHoursToTime($time, $hours) {
            // Create a DateTime object from the input time
            $dateTime = new DateTime($time);
            
            // Add the specified number of hours
            $dateTime->modify("+{$hours} hours");
            
            // Return the new time as a formatted string
            return $dateTime->format('H:i:s');
        }

        $semesters = Semester::all();
        $courses =  Course::all();
        foreach($semesters as $semester){

            foreach($courses as $course){
                $num = rand(1,2);
                for($i=1; $i<=$num; $i++){

                    $randomTime = getRandomTime($minTime, $maxTime);
                    $lecture = new Lecture;
                    $lecture->course_id = $course->id;
                    $lecture->user_id = User::staff()->random()->id;
                    $lecture->is_tutorial = 0;
                    $lecture->semester_id = $semester->id;
                    $lecture->start_time = $randomTime;
                    $lecture->end_time = addHoursToTime($randomTime,$course->credit_hour);
                    $lecture->classroom_id = $course->department->classrooms->random()->id;
                    $lecture->status = $semester->is_active == 1 ? 1 : 2 ;
                    $lecture->save();
                }
            }
        }
    }
}

<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Department;
use App\Models\TimetableCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'department_id',
        'floor',
        'is_lab',
        'exams_cap',
        'reg_cap',
        'max_cap',
        'location',
    ];

// RELATIONSHIPS
    
    // DEPARTMENT
        // Get related department
        public function department(){
            return $this->belongsTo(Department::class);
        }

    // LECTURES
        // Get all related Lectures
        public function lectures(){
            return $this->hasMany(Lecture::class);
        }

        // Get related lectures for the sem
        public function lectures_for_sem($sem){
            return $this->hasMany(Lecture::class)->where('semester_id',$sem)->get();
        }

        // Get related lectures for data
        public function lectures_on($date){
            return $this->lectures()->whereDate('date',$date)->get();
        }

    // TIME TABLE COURSE
        // Get all related time table course for the sem
        public function timetable_courses_for_sem($sem){
            return $this->hasMany(TimetableCourse::class)->where('semester_id',$sem)->get();
        }

// FUNCTIONS
    // Check if Classroom is free between a start and end time on a particular day.
    public function is_occupied_at($start_time,$end_time,$date,$sem){
        return self::occupied_at($start_time,$end_time,$date,$sem)->pluck('id')->contains($this->id);
    }



// STATIC FUNCTION
    // CLASSROOMS
    // Classrooms that are occupied with a given period of time and a day
    public static function occupied_at($start_time,$end_time,$date,$sem){

        return self::whereHas('lectures', function($query) use($start_time,$end_time,$date,$sem){
          $query->where('semester_id', $sem)
                  ->whereDate('date', $date)
                //   ->whereRaw('DAYOFWEEK(`date`) = ?', $day)
                  ->whereBetween('start_time',[$start_time, $end_time])
                  ->WhereBetween('end_time',[$start_time, $end_time])
                ;
        })->get();
      }


    // return what times and days an array of classrooms are occupied
    public static function periods_occupied(array $classroom_ids,$sem){
        // Get the related timeTable Course instances
        $time_table_instances = TimetableCourse::forSem($sem);

        // Get the times and days that the classes are occupied
        $classroom_days = [];
        $classroom_start_times = [];
        $classroom_end_times = [];
        // Foreach of the Classroms
        foreach($classroom_ids as $classroom_id){

            $days = [];
            $start_times = [];
            $end_times = [];
            // Check if it has more than one instance of timetablecourse
            if($time_table_instances->count() > 0){
                
                // Check for each of the instances and store the day and times in an array
                foreach($time_table_instances->where('classroom_id',$classroom_id)->get() as $instance){
                    $day[] =  $instance->day;
                    $start_times[] = $instance->start_time;
                    $end_times[] = $instance->end_time;
                }


            }else{
                // If no occupied instance exists, 
                $days[] = null;
                $times[] = null;
            }
                // the subarrays are store in  nested arrays representing each of the classes
                $classroom_days[] = $days;
                $classroom_start_times[] = $start_times;
                $classroom_end_times[] = $end_times;
        }

        return([$classroom_ids, $classroom_days,$classroom_start_times,$classroom_end_times]);
    }


}

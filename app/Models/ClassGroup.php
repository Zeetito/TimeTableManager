<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Program;
use App\Models\Semester;
use Illuminate\Support\Carbon;
use App\Models\TimetableCourse;
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



        // PROGRAMS
            // Get related program
            public function program(){
                return $this->belongsTo(Program::class);
            }


        // COURSES

        // Get all courses Taken by the class group
        public function all_courses(){
            return Course::whereIn('id',$this->class_group_courses->pluck('course_id'))->get();
        }

        // Ge All related Courses for the Sem
        public function courses_for($sem){
            return Course::whereIn('id',$this->class_group_courses_for($sem)->pluck('course_id'))->get();
            // return ClassGroupCourse::where('class_group_id',$this->id)->where('semester_id',$sem)->get();
        }

        // Get Total credit hours for the sem
        public function total_credit_hour_for($sem){
            return $this->courses_for($sem)->pluck('credit_hour')->sum();
        }

        // LECTURES

            // Get All related lectures
            public function all_lectures(){
                // $courses = $this->class_course_lectures->pluck('course_id');
                return Lecture::whereIn('id',$this->class_course_lectures->pluck('lecture_id'))->get();
                // return $this->hasManyThrough(Lecture::class,ClassCourseLecture::class,"lecture_id","id");
            }

            // Get all related lectues for the Sem
            public function lectures_for($sem){ 
                return $this->all_lectures()->where('semester_id',$sem);

                // $courses = $this->class_group_courses->pluck('course_id');
                // return Lecture::where('semester_id',$sem)->whereIn('course_id',$courses)->get();
            }

            // Get Lectures for sem grouped by Week
            public function grouped_lectures_for($sem){
                $lectures = $this->lectures_for($sem)->sortBy('date');

                // Group by week
                $groupedLectures = $lectures->groupBy(function ($lecture) {
                    // Get the start of the week (Sunday) for the lecture date
                    return Carbon::parse($lecture->date)->startOfWeek()->format('Y-m-d');
                });

                return $groupedLectures;
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

        
        // ClassGroup Course
        // Get related classgroup course instance for a course for the current sem
       public function current_classgroup_course_instance_with(Course $course){
            $active_semester =  Semester::active_semester();
            return ClassGroupCourse::where('class_group_id',$this->id)->where('course_id',$course->id)->where('semester_id',$active_semester->id)->first();
        }


        // TIMETABLE COURSES
        // Get timetable courses instance for the sem
        public function timetable_courses_for($sem){
            return TimetableCourse::whereIn('course_id',$this->courses_for($sem)->pluck('id'));
        }

        // Get timetable courses for a particular day of the sem
        public function timetable_scheduled_for($day, $sem){

            $instances_id =  TimetableCourse::scheduled_for($day,$sem)->get()->intersect($this->timetable_courses_for($sem)->get())->pluck('id');
            // $instances_id =  $this->timetable_courses_for($sem)->where('day',$day)->pluck('id');

            return TimetableCourse::whereIn('id',$instances_id);
        }

// FUNCTIONS
    // self
    // slug_name
    public function slug_name(){
        return $this->name." - ".$this->year;
    }

    // Check if class group can take more courses for the sem
    public function can_add_course($sem){
        if($this->total_credit_hour_for($sem) >= 22){
            return false;
        }else{
            return true;
        }
    }

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
        // return a day and time that an array of classgroups can meet for the same course
        public static function possible_meeting_periods(array $classgroups, $sem){
            $timetable_courses_forSem = TimetableCourse::forSem($sem)->get();

           
        }

        // Return timetable courses shcedueled for a day for an array of classgroups
        public static function timetable_courses_for_classgroups(array $classgroup_ids, $day, $sem){
            $exceeds = false;
            $results = (new TimetableCourse)->newCollection();
            foreach ($classgroup_ids as $classgroup){
                $targets = Classgroup::find($classgroup)->timetable_scheduled_for($day,$sem)->get();

                // Check if any of the classgroups is totally occupied that day
                if ($targets->pluck('duration')->sum() > 6){
                    $exceeds = true;
                }


                $results =  $results->merge($targets);
            }

            return [$exceeds,$results];
        }


        // Get all postGraduate classgroups
        public static function pg_classgroups(){
            return self::whereIn('program_id',Program::pg()->pluck('id'))->get();
        }

        // Get all undergraduage Classgroup
        public static function ug_classgroups(){
            return self::whereIn('program_id',Program::ug()->pluck('id'))->get();
        }

}

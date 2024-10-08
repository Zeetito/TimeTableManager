<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\ClassGroup;
use App\Models\CourseLecturer;
use App\Models\TimetableCourse;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'othername',
        'lastname',
        'gender',
        'identity_number',
        'index_number',
        'is_staff',
        'is_admin',
        'program_id',
        'class_group_id', 
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['fullname'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get user role attribute
    public function getRoleAttribute(){
        if($this->is_admin){
            return "Admin";
        }elseif($this->is_staff){
            return "Staff";
        }else{
            return "Student";
        }
    }


    public function getFullnameAttribute(){
        return $this->firstname." ".$this->lastname;
    }

// STUDENTS

    // RELATIONSHIPS
    // Get tiemtable for a particular user
    public function timetable_for_sem($sem){
        if($this->is_staff){
            $classgroups = $this->staff_classgroups($sem)->pluck('id')->toArray();
            
            $results =  ClassGroup::classgroups_timetable_courses($classgroups,$sem);

            $timetable_courses = $results[1];

            return $timetable_courses->where('user_id',$this->id);
        }
        
        return $this->class_group->timetable_courses_for($sem);
    }

    // Get user college
    public function college(){
        return $this->program()->college;
    }

    // User Program
    public function program(){
        return $this->class_group->program;
    }

    // Return related ClassGroup
    public function class_group(){
        return $this->belongsTo(ClassGroup::class);
    }

// Lectures

    // Return All Lectures for the Sem
    public function lectures_for($sem){
        return $this->class_group->lectures_for($sem);
    }

// Attendance
    

// FUNCTIONS
    // GENERAL
        // Get Fullname of user
        // public function fullname(){
        //     return $this->firstname." ".$this->othername." ".$this->lastname;
        // }

        // Get Avatar
        public function get_avatar(){
            if($this->gender == 'm'){
                return asset('img/avatar/male_avatar.jpg');
            }else{
                return asset('img/avatar/female_avatar.jpg');
            }
        }






// STATIC FUNCTIONS
    // Get All Staff
    public static function staff(){
        return self::where('is_staff',1)->get();
    }

    // Get all Students
    public static function students(){
        return self::where('is_staff',0)->get();
    }

    // Get studetns
    public static function get_students(){
        return self::where('is_staff',0);
    } 
    






// STAFF ////////////////////////////////////////////////////////////////////////////

    // RELATIONSHIPS
        // LECTURES
            // Get related lectures
            public function staff_lectures(){
                return $this->hasMany(Lecture::class,'user_id');
            }

            // Get related lectures for sem
            public function staff_lectures_for_sem($sem){
                return $this->staff_lectures->where('semester_id',$sem)->get();
            }

            // Get staff lectures for a particular date
            public function staff_lectures_on($date){
                return $this->staff_lectures()->whereDate('date',$date)->get();
            }

        // COURSE LECTURE
            // Get related course_lecture instances
            public function course_lecturer(){
                return $this->hasMany(CourseLecturer::class);
            }

        // COURSES
            // Get related course(s) for the lecturer for the sem. the Semester is already catered for.
            public function staff_courses(){
                return Course::whereIn('id',$this->course_lecturer->pluck('course_id'))->get();
            }


        // CLASSGROUPS
            // get related classgroups for the sem
            public function staff_classgroups($sem){
                // return ClassGroup::whereIn();

                return ClassGroup::whereHas('class_group_courses', function ($query) use($sem) {
                    $query->where('semester_id',$sem);
                    $query->whereIn('course_id',$this->staff_courses()->pluck('id'));
                })
                ->get();
            }

        // TIMETABLE COURSE
            // Get related timetable courses
            public function staff_timetable_courses_for($sem){
                return TimetableCourse::forSem($sem)->whereIn('course_id',$this->staff_courses()->pluck('id'));
            }

            // Get staff timetable schedule for a day of the week of a sem
            public function staff_timetable_schedule_for($day,$sem){
                return $this->staff_timetable_courses_for($sem)->where('day',$day);
            }

    // FUNCTIONS
            // Check if Staff is occupied at a particular period of time
            public function staff_is_occupied_at($start_time,$end_time,$date,$sem){
                return self::staff_occupied_at($start_time,$end_time,$date,$sem)->pluck('id')->contains($this->id);
            }

    // STATIC FUNCTIONS
            // Get staff Occupied at a particular point in time
            public static function staff_occupied_at($start_time,$end_time,$date,$sem){
                return self::where('is_staff',1)
                            ->whereHas('staff_lectures', function($query) use($start_time,$end_time,$date,$sem){
                                $query->where('semester_id', $sem)
                                ->whereDate('date',$date)
                                ->whereBetween('start_time',[$start_time, $end_time])
                                ->WhereBetween('end_time',[$start_time, $end_time]);
                })->get();
            }

            // Return timetable courses shcedueled for a day for an array of lecturers
            public static function timetable_courses_for_lecturers(array $lecturer_ids, $day, $sem){
                $exceeds = false;
                $results = (new TimetableCourse)->newCollection();
                foreach ($lecturer_ids as $lecturer){
                    $targets = User::find($lecturer)->staff_timetable_schedule_for($day,$sem)->get();

                    // Check if any of the classgroups is totally occupied that day
                        if ($targets->pluck('duration')->sum() > 6){
                            $exceeds = true;
                        }
                        
                    $results =  $results->merge($targets);
                }

                return [$exceeds,$results];
            }

}

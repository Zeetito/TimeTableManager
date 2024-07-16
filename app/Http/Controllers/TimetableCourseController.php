<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Jobs\GenerateTimetable;
use App\Models\TimetableCourse;
use Illuminate\Support\Facades\DB;
use App\Services\SchedulerServiceCopy;
use Illuminate\Database\QueryException;
// use App\Services\SchedulerService;

class TimetableCourseController extends Controller
{

    protected $schedulerService;

    public function __construct(SchedulerServiceCopy $schedulerService)
    {
        $this->schedulerService = $schedulerService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // Get/view the current info, 
    public function info(Semester $semester){
        return view('admin.timetable_course.info',['semester'=>$semester]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TimetableCourse $timetableCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimetableCourse $timetable_course)
    {
        //
        return view('admin.timetable_course.edit',['timetable_course'=>$timetable_course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimetableCourse $timetable_course)
    {
        if ($timetable_course) {
            try {
                // Update the timetable course with new values
                $timetable_course->day = $request->input('available_days');
                $timetable_course->start_time = $request->input('available_times');
                $timetable_course->classroom_id = $request->input('available_classrooms');
                $timetable_course->save();
    
                // Redirect back with success message
                return redirect()->back()->with('success', 'Update Successful');
                
            } catch (QueryException $e) {
                // Check for duplicate entry error code (typically 23000 for MySQL)
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->back()->with('error', 'Duplicate entry detected. Please check your input.');
                }
    
               
                return redirect()->back()->with('error', 'An error occurred while updating the record. Please try again.');
            }
        }
    
        return redirect()->back()->with('error', 'Timetable course not found.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimetableCourse $timetableCourse)
    {
        //
    }

    // Generate timetable for all courses for the sem
    public function generate_timetable(Semester $semester){
        // return redirect()->back()->with('success','Hey'); 
        
        // return $this->schedulerService->scheduleTimetable_forSem($semester);
        
        GenerateTimetable::dispatch($semester)->onQueue('timetable_generation');

        
        return redirect()->back()->with('success','Generation in Progress'); 
        // return "done, Job Started, I guess";
    }

    // get_percentage_allocation_complete
    public function get_percentage_allocation_complete(Semester $semester){
        return Course::percent_complete_allocation($semester)." % Complete";   
    }

    // Get the number of fully allocated courses for the sem
    public function get_fully_allocated_courses_number(Semester $semester){
        return Course::fully_assigned($semester->id)->count();   
    }

    // Get total number courses being offered for the sem
    public function get_courses_being_offered_number(Semester $semester){
        return Course::being_offered($semester->id)->count();   
    }

    // Get total number courses partially allocated for the sem
    public function get_partially_allocated_courses_number(Semester $semester){
        return Course::partially_assigned($semester->id)->count();   
    }

    // Get the number of unallocated courses for the sem
    public function get_unallocated_courses_number(Semester $semester){
        return Course::non_assigned($semester->id)->count();   
    }

    // Check if a timetable generate is in session
    public function timetable_generation_active(){
       if(DB::table('jobs')->where('queue','timetable_generation')->exists()){
         return 1;  
       }else{
        return 0;
       };
    }

    // Get the available times for a timetableCourse
    public function get_available_times_for_timetable_course(Request $request, TimetableCourse $timetable_course){
        $course =  $timetable_course->course;

        $day =  $request->input('variable');

        $engaged_start_times =  $course->available_start_times_on($day,$timetable_course->semester_id,$timetable_course->duration,$timetable_course->id);

        return($engaged_start_times);
    }

    // Get the available classrooms for a course
    public function get_available_classrooms_for_timetable_course(Request $request, TimetableCourse $timetable_course, $day){
        $course =  $timetable_course->course;

        $start_time =  $request->input('variable');

        $available_classrooms = $course->available_classrooms_on($day,$timetable_course->semester_id,$start_time,$timetable_course);

        return $available_classrooms;

    }





}

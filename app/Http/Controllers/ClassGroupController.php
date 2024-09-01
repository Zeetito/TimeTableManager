<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Semester;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use App\Models\TimetableCourse;

class ClassGroupController extends Controller
{
    //
    // Show All ClassGroups
    public function index(){
        $classgroups = ClassGroup::all();
        $semester = Semester::active_semester();
        return view('admin.classgroup.index',['classgroups'=>$classgroups,'title'=>"Classgroups",'semester'=>$semester]);
    }

    // Show single ClassGroup
    public function show(ClassGroup $classgroup){
        $semester = Semester::active_semester();
        // return 
        // return $classgroup->timetable_courses_for(6)->where('day',2)->get();
        $start_times = TimetableCourse::START_TIMES;
        return view('admin.classgroup.show',['classgroup'=>$classgroup,'semester'=>$semester,'carbon'=>Carbon::class, 'start_times'=>$start_times ]);
    }
}

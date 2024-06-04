<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Semester;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class ClassGroupController extends Controller
{
    //
    // Show All ClassGroups
    public function index(){
        $classgroups = ClassGroup::all();
        return view('admin.classgroup.index',['classgroups'=>$classgroups,'title'=>"Classgroups"]);
    }

    // Show single ClassGroup
    public function show(ClassGroup $classgroup){
        $semester = Semester::active_semester();
        return view('admin.classgroup.show',['classgroup'=>$classgroup,'semester'=>$semester,'carbon'=>Carbon::class]);
    }
}

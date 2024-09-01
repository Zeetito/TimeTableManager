<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // return all colleges
    public function index(){
        $colleges = College::all();
        return view('admin.college.index',compact('colleges'));
    }

    // Show college
    public function show(College $college){
        return view('admin.college.show',compact('college'));
    }
}

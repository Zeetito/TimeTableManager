<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function show(Faculty $faculty){
        return view('admin.faculty.show',compact('faculty'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    


    // Show a Department
    public function show(Department $department){
        return view('admin.department.show',compact('department'));
    }
}

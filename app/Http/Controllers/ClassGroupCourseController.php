<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use App\Models\ClassGroupCourse;

class ClassGroupCourseController extends Controller
{
    //
    // Create
    public function create(ClassGroup $classgroup){
        $courses = Course::all()->diff($classgroup->courses_for(Semester::active_semester()->id));
        return view('admin.classgroup_course.create',['classgroup'=>$classgroup, 'courses'=>$courses]);
    }

    // Store 
    public function store(Request $request, ClassGroup $classgroup){
        $semester = Semester::active_semester();
        $course = Course::where('code',$request->input('course_name'))->first();

        // Check if the class group can take more courses
        if($course->credit_hour + $classgroup->total_credit_hour_for($semester->id) > 21){
            return redirect()->back()->with('failure','Can\'t go beyond 21 Credit hours!');
        }

        $classgroup_course = new ClassGroupCourse;
        $classgroup_course->class_group_id = $classgroup->id;
        $classgroup_course->course_id = $course->id;
        $classgroup_course->semester_id = $semester->id;
        $classgroup_course->save();

        return redirect()->back()->with('success','Course Added Successfully');

    }

    // Confirm delete
    public function confirm_delete(ClassGroupCourse $classgroup_course){
        return view('admin.classgroup_course.delete',['classgroup_course'=>$classgroup_course]);

    }

    // Delete
    public function delete(Request $request, ClassGroupCourse $classgroup_course){
        if($request->input('choice') == 'yes' ){
            // delete
            $classgroup_course->delete();
            return redirect()->back()->with('warning','Delete Successful!');
        }
    }

    // Assign Lecturer form
    public function assign_lecturer_form(ClassGroupCourse $classgroup_course){
        return view('admin.classgroup_course.assign-lecturer',['classgroup_course'=>$classgroup_course]);
    }

    // Assgin Lecturere Post
    public function assign_lecturer(Request $request, ClassGroupCourse $classgroup_course){
        $lecturer = User::find($request->input('lecturer_id'));

        // Check if the user instance exists and the instance is a staff
        if($lecturer && $lecturer->is_staff == 1){
            $classgroup_course->user_id = $lecturer->id;
            $classgroup_course->save();

            return redirect()->back()->with('success','Lecturer Assigned Successfully!');

        }else{
            return redirect()->back()->with('failure','Select a Valid Lecturer');
        }
        
        return view('admin.classgroup_course.assign-lecturer',['classgroup_course'=>$classgroup_course]);
    }

    // Assgin Lecturere Post
    public function unassign_lecturer_form(ClassGroupCourse $classgroup_course){

        return view('admin.classgroup_course.unassign-lecturer',['classgroup_course'=>$classgroup_course]);
        
    }

    // UnAssgin Lecturere Post
    public function unassign_lecturer(Request $request, ClassGroupCourse $classgroup_course){
        if($request->input('choice') == 'yes'){
            $classgroup_course->update(['user_id'=>NULL]);
            // $classgroup_course->user_id == NULL;
            // $classgroup_course->save();
            return redirect()->back()->with('warning','Lecturer Removed Successfully!');
        }else{

            return redirect()->back()->with('failure','Select Valid Choice!');
        }


       
    }

    // Edit
    public function edit(ClassGroupCourse $classgroup_course){
        return view('admin.classgroup_course.edit',['classgroup_course'=>$classgroup_course]);
    }
    
}

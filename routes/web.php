<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Lecture;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\Department;
use App\Models\TimetableCourse;
use App\Models\ClassGroupCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TimetableCourseController;
use App\Http\Controllers\ClassGroupCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return User::find(2)->timetable_for_sem(6);
    return TimetableCourse::find(4)->course->college();
    


});


// USER
    // View User profile
    Route::get('profile/{user}',[UserController::class,'profile'])
    ->middleware('auth')
    ->name('profile');

// COLLEGES
    // View all colleges
    Route::get('colleges',[CollegeController::class,'index'])
    ->middleware('auth')
    ->name('colleges');    

    // Show college
    Route::get('colleges/{college}',[CollegeController::class,'show'])
    ->middleware('auth')
    ->name('show_college');

// FACULTY
    // View all faculties

    // Show A Faculty
    Route::get('faculties/{faculty}',[FacultyController::class,'show'])
    ->middleware('auth')
    ->name('show_faculty');

// DEPARTMENT
    // View all departments

    // Show a department
    Route::get('departments/{department}',[DepartmentController::class,'show'])
    ->middleware('auth')
    ->name('show_department');


// CLASSROOMS
    // View Clashing Classrooms
    Route::get('clashing_classrooms/{semester}',[ClassroomController::class,'clashing'])
    ->middleware('auth')
    ->name('clashing_classrooms');


// TIMETABLE COURSE
    // Timetable Landing page
    Route::get('timetable_info/{semester}',[TimetableCourseController::class,'info'])
    ->middleware('auth')
    ->name('timetable_info');

    // Editing Timetable Course Instance
    Route::get('edit_timetable_course/{classgroup}/{timetable_course}',[TimetableCourseController::class,'edit'])
    ->middleware('auth')
    ->name('edit_timetable_course');

    // Update Timetable Course
    Route::put('update_timetable_course/{timetable_course}',[TimetableCourseController::class,'update'])
    ->middleware('auth')
    ->name('update_timetable_course');

    // View tiemtable for a particular user
    Route::get('user_timetable/{user}/{semester}',[UserController::class,'timetable'])
    ->middleware('auth')
    ->name('user_timetable');






    // Generate Timetable
    Route::get('generate_timetable/{semester}',[TimetableCourseController::class,'generate_timetable'])
    ->middleware('auth')
    ->name('generate_timetable');

    // Check if a timetable generate is in session
    Route::get('timetable_generation_active',[TimetableCourseController::class,'timetable_generation_active'])
    ->middleware('auth')
    ->name('timetable_generation_active');

    // Get Percentage allocation completion
    Route::get('get_percentage_allocation_complete/{semester}',[TimetableCourseController::class,'get_percentage_allocation_complete'])
    ->middleware('auth')
    ->name('get_percentage_allocation_complete');

    // Get the Number of fully allocated courses for the sem
    Route::get('get_fully_allocated_courses_number/{semester}',[TimetableCourseController::class,'get_fully_allocated_courses_number'])
    ->middleware('auth')
    ->name('get_fully_allocated_courses_number');

    // Get total number courses being offered for the sem
    Route::get('get_courses_being_offered_number/{semester}',[TimetableCourseController::class,'get_courses_being_offered_number'])
    ->middleware('auth')
    ->name('get_courses_being_offered_number');

    // Get total number courses partially allocated for the sem
    Route::get('get_partially_allocated_courses_number/{semester}',[TimetableCourseController::class,'get_partially_allocated_courses_number'])
    ->middleware('auth')
    ->name('get_partially_allocated_courses_number');

    // Get the number of unallocated courses for the sem
    Route::get('get_unallocated_courses_number/{semester}',[TimetableCourseController::class,'get_unallocated_courses_number'])
    ->middleware('auth')
    ->name('get_unallocated_courses_number');
    
    // Get available times for timetable_course
    Route::get('get_available_times_for_timetable_course/{timetable_course}',[TimetableCourseController::class,'get_available_times_for_timetable_course'])
    ->middleware('auth')
    ->name('get_available_times_for_timetable_course');
    
    // Get available_classrooms_for_timetable_course
    Route::get('get_available_classrooms_for_timetable_course/{timetable_course}/{day}',[TimetableCourseController::class,'get_available_classrooms_for_timetable_course'])
    ->middleware('auth')
    ->name('get_available_classrooms_for_timetable_course');
    





// CLASSGROUP

    // View ClassGroups - INdex
    Route::get('classgroups',[ClassGroupController::class,'index'])
    ->middleware('auth')
    ->name('classgroups');

    // Show ClassGroup - show
    Route::get('classgroups/{classgroup}',[ClassGroupController::class,'show'])
    ->middleware('auth')
    ->name('show_classgroup');


// CLASSGROUP COURSE
    // Create ClassGroup Course Instance
    Route::get('create_classgroup_course/{classgroup}',[ClassGroupCourseController::class,'create'])
    ->middleware('auth')
    ->name('create_classgroup_course');

    // store ClassGroup Course Instance
    Route::post('store_classgroup_course/{classgroup}',[ClassGroupCourseController::class,'store'])
    ->middleware('auth')
    ->name('store_classgroup_course');

    // Confirm delete
    Route::get('confirm_delete_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'confirm_delete'])
    ->middleware('auth')
    ->name('confirm_delete_classgroup_course');

    // delete
    Route::delete('delete_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'delete'])
    ->middleware('auth')
    ->name('delete_classgroup_course');

    // Assign Lecturer to instance -  form
    Route::get('assign_lecturer_form_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'assign_lecturer_form'])
    ->middleware('auth')
    ->name('assign_lecturer_form_classgroup_course');

    // unassign Lecturer to instance -  form
    Route::get('unassign_lecturer_form_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'unassign_lecturer_form'])
    ->middleware('auth')
    ->name('unassign_lecturer_form_classgroup_course');

    // unassign lecturer to instance - Post
    Route::post('unassign_lecturer_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'unassign_lecturer'])
    ->middleware('auth')
    ->name('unassign_lecturer_classgroup_course');

    // Assgin lecturer to instance - Post
    Route::post('assign_lecturer_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'assign_lecturer'])
    ->middleware('auth')
    ->name('assign_lecturer_classgroup_course');

    // Edit Instance
    Route::get('edit_classgroup_course/{classgroup_course}',[ClassGroupCourseController::class,'edit'])
    ->middleware('auth')
    ->name('edit_classgroup_course');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

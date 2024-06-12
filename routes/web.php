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
use App\Models\TimetableCourse;
use App\Models\ClassGroupCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassGroupController;
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


    $start_time = Carbon::createFromTimeString("08:00:00");
    $end_time = Carbon::createFromTimeString("9:55:00");

    return  round(($start_time->diffInMinutes($end_time))/60); 

    return Course::find(44)->timetablecourses_for(6);

    // return TimetableCourse::START_TIMES;

    $class_occupied_periods = Classroom::periods_occupied([102,51,78,665,847],6); 
    $daysOfTheWeek = [1,2,3,4,5];
    $classroom_ids = $class_occupied_periods[0];
    $classroom_occupied_days = $class_occupied_periods[1];
    $occupied_start_times = $class_occupied_periods[2];
    $occupied_end_times = $class_occupied_periods[3];

    // return $occupied_start_times;
    // assuming best_day = 3;
    $classroom_occupied_days[2][3] = 3;
    foreach($classroom_occupied_days as $index=>$day){
        
        if(in_array(3, array_diff($daysOfTheWeek, $day) )){
            $best_classroom = $classroom_ids[$index];
            $possible_best_start_times = array_diff(TimetableCourse::START_TIMES,$occupied_start_times[$index] );
            $possible_best_end_times = array_diff(TimetableCourse::END_TIMES,$occupied_end_times[$index] );
            // dd($possible_best_end_times);
            break;
        }else{
            continue;
        }
    }

    // return $possible_best_end_times;
    // --Possible times secured


    // Getting array of best times too

    

   
// return TimetableCourse::forSem(6);

// return User::staff()->random()->staff_timetable_courses_for(6);
// // return TimetableCourse::forSem(6);
// return ClassGroup::find(1)->timetable_scheduled_for(1,6);


});


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

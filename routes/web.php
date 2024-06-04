<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Semester;
use App\Models\ClassGroup;
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

    

    // return date('l', mktime(0, 0, 0, 1, 1, 1970));

    return ClassGroup::all()->random()->grouped_lectures_for(6);

    // return Lecture::getLecturesGroupedByWeek(6);

    // foreach(Semester::all() as $semester){

    //     // $startDate = Carbon::create($semester->start_date);
    //     // $endDate = Carbon::create($semester->end_date);

    //     // // Convert to timestamps
    //     // $min = $startDate->timestamp;
    //     // $max = $endDate->timestamp;

    //     // // Generate a random timestamp between start and end dates
    //     // $randomTimestamp = rand($min, $max);

    //     // // Convert the random timestamp back to a Carbon date
    //     // $randomDate = Carbon::createFromTimestamp($randomTimestamp)->format('Y-m-d');

        

    //     // // return $randomDate;

    //     // $lectures = Lecture::forSem($semester->id);
    //     // $count = 0;
    //     // $rand = 3;
    //     // foreach($lectures as $lecture){


    //     //     if($count == $rand){
    //     //         $rand = rand(1,3);
    //     //         $count = 0;
    //     //         $randomTimestamp = rand($min, $max);
    //     //         $randomDate = Carbon::createFromTimestamp($randomTimestamp)->format('Y-m-d');

    //     //     }else{
    //     //         $lecture->date = $randomDate;
    //     //         $lecture->save();
    //     //         $count ++;
    //     //     }

    //     // }
    // }

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

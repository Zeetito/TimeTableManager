<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\ClassGroup;
use App\Models\ClassGroupCourse;
use Illuminate\Support\Facades\Route;

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

    // return App\Models\ClassGroup::all()->random()->class_group_courses->pluck('id');
    // return App\Models\Lecture::find(43)->expected_attendees(); 
    // return App\Models\Lecture::all()->random()->class_groups();
    // $lecture = Lecture::find(1693);
    // return $lecture->class_groups();

    return ClassGroup::all()->random()->users->count();
    $cgc =  ClassGroupCourse::all()->random();
    return $cgc->class_group->max_attendance_for_course($cgc);

    $class_group = App\Models\ClassGroup::find(313);
    // return $class_group->users;
    $class_lectures = $class_group->lectures_for(6)->random();
    // echo $class_lectures->absentees()->pluck('id')->count();
    // echo $class_group->class_group_courses;
    return $class_group->absentees_for($class_lectures)->pluck('id')->min();
    // return $class_group->class_course_lectures;
    // echo $class_group;
    return App\Models\ClassGroup::find(2054)->all_lectures()->random()->class_group_courses;
    return $class_group->attendees_for($class_group->all_lectures()->random());
    return App\Models\User::students()->random()->upcoming_lectures(6)->count();



    return $lecture->absentees();
    return $lecture->expected_attendees()->count()."-".$lecture->attendees()->count();
    return App\Models\Attendance::all()->random()->lecture->expected_attendees()->count();

    
    return App\Models\User::students()->count();
    return App\Models\Lecture::forSem(App\Models\Semester::first()->id);

    return App\Models\Course::all()->random()->department;

    

    // for($i=1; $i<=10; $i++){
    //     $word = fake()->word;
    //     if(strlen($word)< 3 ||  strlen($word)>4  ){
    //         $i = $i-1;
    //         continue;
    //     } else{
    //         echo strtoupper($word).' '.rand(100,999)  .'<br>';
    //     }
    // }

    // return rand(15,20);

    return fake()->sentence;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

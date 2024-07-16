<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    

    // View Clashing Classrooms
    public function clashing(Semester $semester){

        // $clashing_classroom_timetable_courses =  Classroom::whereHas('timetable_courses', function($query) use($semester){

        //     $query->where('semester_id',$semester->id);
        // })

        $clashing_classroom_timetable_courses = Classroom::whereHas('timetable_courses', function ($query) use ($semester) {
            $query->where('semester_id', $semester->id);
        })
        ->with(['timetable_courses' => function ($query) use ($semester) {
            $query->where('semester_id', $semester->id);
        }])
        ->get()
        ->filter(function ($classroom) {
            return $classroom->timetable_courses->groupBy(function ($item) {
                return $item->classroom_id . '-' . $item->day . '-' . $item->start_time;
            })->filter(function ($group) {
                return $group->count() > 1;
            })->isNotEmpty();
        });

        return $clashing_classroom_timetable_courses;

        // return view('admin.classroom.clashing');
    }
    
}

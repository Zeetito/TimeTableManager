<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Semester;
use Illuminate\Database\Seeder;
use App\Models\ClassGroupCourse;
use App\Models\ClassCourseLecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassGroupCourseLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach(Semester::all() as $semester){

            // $lectures = Lecture::forSem($semester->id);
            // foreach($lectures as $lecture){
            //     $num = rand(1,3);
            //     for($i=1; $i<=$num; $i++){
            //         $ccl = new ClassCourseLecture;
            //         $ccl->lecture_id = $lecture->id;
            //         $ccl->class_group_course_id = $lecture->course->class_group_courses_for($semester->id)->random()->id;
            //         $ccl->save();
            //     }
            // }

            $cgcs = ClassGroupCourse::forSem($semester->id);
            foreach($cgcs as $cgc){
                
                foreach($cgc->course->lectures_for($semester->id) as $lecture){
                    $ccl = new ClassCourseLecture;
                            $ccl->lecture_id = $lecture->id;
                            $ccl->class_group_course_id = $cgc->id;
                            $ccl->save();
                }

            }


        }
    }
}

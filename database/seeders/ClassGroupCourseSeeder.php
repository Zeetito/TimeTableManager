<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Semester;
use App\Models\ClassGroup;
use Illuminate\Database\Seeder;
use App\Models\ClassGroupCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassGroupCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = Semester::all();
        $classgroups = ClassGroup::all();

        foreach($semesters as $semester){
            foreach($classgroups as $classgroup){
                $courses =  rand(7,9);
                for($i=0; $i<=$courses; $i++){
                    $course = Course::inRandomOrder()->first();
                    $cgc = new ClassGroupCourse;
                    $cgc->class_group_id = $classgroup->id; 
                    $cgc->course_id = $course->id; 
                    $cgc->semester_id = $semester->id;
                    $cgc->save();

                }
            }
        }
    }
}

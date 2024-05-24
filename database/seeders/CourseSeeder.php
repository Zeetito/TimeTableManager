<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $departments = Department::all();

        foreach($departments as $department) {
            // Setting Random number of Courses for each department
            $courses = rand(16,25);
            for($i = 1; $i <= $courses; $i++) {
                // Creating Random Courses for Each Department
                $course = new Course;
                $course->name = ucwords(fake()->sentence());
                $course->code = fake()->word();

                // The Code must be 3 or 4 letters
                if(strlen($course->code) < 3 || strlen($course->code) > 4) {
                    // if not, start that step again
                    $i = $i-1;
                    continue;
                }else{
                    $course->code = strtoupper($course->code).' '.rand(100, 999);
                }

                $course->credit_hour = rand(1,3);
                $course->department_id = $department->id;

                $course->save();
            }
        }

    }
}

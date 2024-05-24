<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomSeeder extends Seeder
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
            $classrooms = rand(60,100);
            for($i = 1; $i <= $classrooms; $i++) {
                // Creating Random Courses for Each Department
                $classroom = new Classroom;
                $classroom->name = fake()->word();

                // The name must be 3 or 4 letters
                if(strlen($classroom->name) < 2 || strlen($classroom->name) > 4) {
                    // if not, start that step again
                    $i = $i-1;
                    continue;
                }else{
                    $classroom->name = strtoupper($classroom->name).' '.rand(1, 35);
                }

                $classroom->department_id = $department->id;
                $classroom->floor = fake()->randomElement(['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth']);
                $classroom->is_lab = 0;
                $classroom->exams_cap = rand(100,150);
                $classroom->reg_cap = rand(250,350);
                $classroom->max_cap = rand(400,450);
                // $classroom->location = NULL;
                $classroom->save();
            }
        }
    }
}

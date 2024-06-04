<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseLecturer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseLecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach(Course::all() as $course){
            $cl = new CourseLecturer;
            $cl->user_id = User::staff()->random()->id;
            $cl->course_id = $course->id;
            $cl->save();
        }
    }
}

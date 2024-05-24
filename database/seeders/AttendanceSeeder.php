<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Lecture::all() as $lecture){
            $a = new Attendance;
            $a->name = $lecture->course->code."-".$lecture->lecturer->fullname();
            $a->lecture_id = $lecture->id;
            $a->save();
        }
    }
}

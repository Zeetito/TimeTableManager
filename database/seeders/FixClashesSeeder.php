<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\ClassGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FixClashesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sem = Semester::active_semester()->id;
        // Fix issues with the courses after seeding
        
        // Get courses with clashing timetable
        $clashing_classgroups = ClassGroup::with_clashing_courses($sem);

        foreach($clashing_classgroups as $classgroup){

            $classgroup->fix_clashing_courses($sem);

            echo "$classgroup->id";
        }
    }
}

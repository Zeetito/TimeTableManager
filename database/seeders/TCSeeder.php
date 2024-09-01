<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassGroup;
use App\Models\TimetableCourse;
use Illuminate\Database\Seeder;
use App\Services\SchedulerService;
use Illuminate\Support\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $semester = Semester::active_semester();
        SchedulerService::scheduleTimetable_forSem($semester);
    }

}

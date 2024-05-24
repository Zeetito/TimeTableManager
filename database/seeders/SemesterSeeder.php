<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::create([
            'academic_year_id' => 1,
            'name' => 1,
            'start_date' => '2022-01-14 00:00:00',
            'end_date' => '2022-04-28 23:59:59',
        ]);

        Semester::create([
            'academic_year_id' => 1,
            'name' => 2,
            'start_date' => '2022-05-18 00:00:00',
            'end_date' => '2022-09-24 23:59:59',
        ]);
        // 2023 2023
        Semester::create([
            'academic_year_id' => 2,
            'name' => 1,
            'start_date' => '2023-01-14 00:00:00',
            'end_date' => '2023-04-28 23:59:59',
        ]);

        Semester::create([
            'academic_year_id' => 2,
            'name' => 2,
            'start_date' => '2023-05-18 00:00:00',
            'end_date' => '2023-09-24 23:59:59',
        ]);

        // 2023 2024
        Semester::create([
            'academic_year_id' => 3,
            'name' => 1,
            'start_date' => '2024-01-14 00:00:00',
            'end_date' => '2024-04-26 00:00:00',
        ]);
        Semester::create([
            'academic_year_id' => 3,
            'name' => 2,
            'start_date' => '2024-05-11 00:00:00',
            'end_date' => '2024-08-23 00:00:00',
            'is_active' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $academic_years = [
            ['start_year' => '2021', 'end_year' => '2022'],
            ['start_year' => '2022', 'end_year' => '2023'],
            ['start_year' => '2023', 'end_year' => '2024'],
        ];

        foreach ($academic_years as $academic_year) {
            AcademicYear::create($academic_year);
        }
    }
}

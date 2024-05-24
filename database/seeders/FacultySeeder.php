<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [
            // College of Agriculture
            ['name' => 'FACULTY OF AGRICULTURE', 'college_id' => 1],
            ['name' => 'FACULTY OF RENEWABLE NATURAL RESOURCES', 'college_id' => 1],
            // College of Art and Built
            ['name' => 'FACULTY OF BUILT ENVIRONMENT', 'college_id' => 4],
            ['name' => 'FACULTY OF ART', 'college_id' => 4],
            ['name' => 'FACULTY OF EDUCATIONAL STUDIES ', 'college_id' => 4],
            // College Of Engineering
            ['name' => 'FACULTY OF CIVIL AND GEO-ENGINEERING', 'college_id' => 3],
            ['name' => 'FACULTY OF ELECTRICAL & COMPUTER ENGINEERING', 'college_id' => 3],
            ['name' => 'FACULTY OF MECHANICAL & CHEMICAL ENGINEERING', 'college_id' => 3],
            // College of Health Science
            ['name' => 'FACULTY OF PHARMACY AND PHARMACEUTICAL SCIENCES', 'college_id' => 6],
            ['name' => 'FACULTY OF ALLIED HEALTH SCIENCES', 'college_id' => 6],
            ['name' => 'SCHOOL OF MEDICINE AND DENTISTRY', 'college_id' => 6],
            ['name' => 'SCHOOL OF PUBLIC HEALTH', 'college_id' => 6],
            // College Of Humanities and Social Sciences
            ['name' => 'FACULTY OF LAW', 'college_id' => 2],
            ['name' => 'FACULTY OF SOCIAL SCIENCES', 'college_id' => 2],
            // College Of Science
            ['name' => 'FACULTY OF BIOSCIENCES', 'college_id' => 5],
            ['name' => 'FACULTY OF PHYSICAL & COMPUTATIONAL SCIENCES', 'college_id' => 5],

        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}

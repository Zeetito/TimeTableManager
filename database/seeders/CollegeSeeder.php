<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            ['name' => 'COLLEGE OF AGRICULTURE AND NATURAL RESOURCES'],
            ['name' => 'COLLEGE OF HUMANITY AND SOCIAL SCIENCES'],
            ['name' => 'COLLEGE OF ENGINEERING'],
            ['name' => 'COLLEGE OF ART AND BUILT ENVIRONMENT'],
            ['name' => 'COLLEGE OF SCIENCE'],
            ['name' => 'COLLEGE OF HEALTH SCIENCES'],
        ];

        foreach ($colleges as $college) {
            College::create($college);
        }
    }
}

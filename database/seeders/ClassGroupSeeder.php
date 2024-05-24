<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ClassGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        function getFirstLetters($text) {
            // Split the text into words
            $words = explode(' ', $text);
            
            // Extract the first letter of each word and concatenate them
            $firstLetters = '';
            foreach ($words as $word) {
                $firstLetters .= substr($word, 0, 1);
            }
            
            return substr($firstLetters,1);
        }

        $programs = Program::all();

        $base_year = 2020;

        foreach($programs as $program) {
            for($s=1; $s<=$program->span; $s++){
                
                $classgroup = new ClassGroup;

                $classgroup->name = getFirstLetters($program->name);
                $classgroup->year = $s;
                $classgroup->program_id = $program->id;
                $classgroup->start_year = ($base_year + ($program->span - $s)) . "-01-01";
                $classgroup->end_year  = ($base_year + $program->span) . "-01-01";
                
                $classgroup->save();
            }
            
        }
    }
}

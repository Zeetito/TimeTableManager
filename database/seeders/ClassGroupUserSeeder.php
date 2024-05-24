<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ClassGroup;
use App\Models\ClassGroupUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassGroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach(User::students() as $student){
           $cgu = new ClassGroupUser; 
           $cgu->class_group_id = ClassGroup::all()->random()->id;
           $cgu->user_id = $student->id;
           $cgu->save();
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          //
        // Student user
        User::create([
            'username' => 'student',
            'firstname' => 'Student-John',
            'lastname' => 'Student-Doe',
            'othername' => '',
            'gender' => 'm',
            'identity_number' => '200000000',
            'index_number' => '100000000',
            'email' => 'student@gmail.com',
            'is_staff' => '0',
            'is_admin' => '0',
            'class_group_id' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
           
        ]);

        // Staff user
        User::create([
            'username' => 'staff',
            'firstname' => 'Staff-John',
            'lastname' => '',
            'othername' => 'Staff-Doe',
            'gender' => 'm',
            'email' => 'staff@gmail.com',
            'is_staff' => '1',
            'is_admin' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
          
           
        ]);
        
     

        User::factory()->count(5500)->staff()->create();
        User::factory()->count(3000)->pg_student()->create();
        User::factory()->count(85000)->ug_student()->create();
    }
}

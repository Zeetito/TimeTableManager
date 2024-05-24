<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\AttendanceUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach(Attendance::all() as $attendance){
            $expected_attendees = $attendance->lecture->expected_attendees(); 
            // Check if Expected Attendees of the related lecture is greater than zero
            if($expected_attendees->count() > 0){
                // Set number of people who attenden the Class
                $rand = rand(1,$expected_attendees->count());
                $count = 0;
                foreach($expected_attendees as $attendee){
                    if($count > $rand){
                        break;
                    }
                    $au = new AttendanceUser;
                    $au->attendance_id = $attendance->id;
                    $au->user_id = $attendee->id;
                    $au->marked_by = $attendance->lecture->lecturer->id;
                    $au->save();
                    $count++;
                }

            }else{
                continue;
            }
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timetable_courses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('course_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('semester_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->integer('day');
            $table->integer('duration')->nullable();

            $table->foreignId('classroom_id')->nullable()
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->time('start_time')->nullable();

            $table->time('end_time')->nullable();

            $table->foreignId('user_id')->nullable()
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null'); //lecturer
            
            
            $table->timestamps();

            // Unique contraint on Same Sem, Day ,Classroom and Startime
            $table->unique(['semester_id','day','classroom_id','start_time'],'course_day_start');
            
            $table->unique(['semester_id','day','classroom_id','end_time'],'course_day_end');

            // Unique contraint on Same Sem, Day ,Lecturer and Startime
            $table->unique(['semester_id','day','user_id','start_time'],'course_day_user_start');
            
            $table->unique(['semester_id','day','user_id','end_time'],'course_day_user_end');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_courses');
    }
};

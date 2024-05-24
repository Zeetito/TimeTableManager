<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'college_id',
        'faculty_id',
        'location',
    ];


    // RELATIONSHIPS
    // Get all classrooms
    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }
}

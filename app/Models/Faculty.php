<?php

namespace App\Models;

use App\Models\College;
use App\Models\Classroom;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'college_id',
        'location',
    ];

// RELATIONSHIPS
    // COLLEGE
    // Get related college
    public function college(){
        return $this->belongsTo(College::class);
    }


    // DEPARTMENT
    // Get all related departments
    public function departments(){
        return $this->hasMany(Department::class,'faculty_id');
    }


    // CLASSROOMS
    // Get all related classrooms
    public function classrooms(){
        return Classroom::whereIn('department_id',$this->departments->pluck('id'))->get();

    }

}


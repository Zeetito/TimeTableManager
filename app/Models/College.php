<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];


// RELATIONSHIPS

    // DEPARTMENTS
        // Get all related department
        public function departments(){
            return $this->hasMany(Department::class,'college_id');
        }

    // CLASSROOMS
        public function classrooms(){
            // Get all related classrooms
            return Classroom::whereIn('department_id',$this->departments->pluck('id'))->get();
        }
}

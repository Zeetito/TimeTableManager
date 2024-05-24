<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'department_id',
        'credit_hour',
    ];


    // RELATIONSHIPS
    // Return the related Department
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // Get the ClassGroup-Courses instances for a particular sem
    public function class_group_courses_for($sem){
        return $this->hasMany(ClassGroupCourse::class)->where('semester_id',$sem)->get();
    }

    // Return ClassGroups For A particular Sem
    public function class_groups_for($sem){
        return ClassGroup::whereIn('id',$this->class_group_courses_for($sem)->pluck('class_group_id'))->get();
    }

    // return the related LEctures for a sem
    public function lectures_for($sem){
        return $this->hasMany(Lecture::class)->where('semester_id',$sem)->get();
        // return Lecture::where('semester_id',$sem)->
    }
}

<?php

namespace App\Models;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year_id',
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    // RELATIONSHIPS
    // Get the related Academic year
    public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
    }

    // FUNCTIONS
    // Get the academic name for a semester
    public function academic_name(){
        return $this->academicYear->start_year."-".$this->academicYear->end_year." Sem".$this->name;
    }


    // STATIC FUNCTIONS
    // return Active semester
    public static function active_semester(){
        return self::where('is_active',1)->first();
    }

    
}

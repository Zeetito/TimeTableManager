<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'college_id',
        'faculty_id',
        'department_id',
        'type',
        'span',
    ];

    // RELATIONSHIPS

    // ClassGroups
    public function classgroups(){
        return $this->hasMany(ClassGroup::class);
    }


    // STATIC FUNCTIONS
    // Get postGraduate programs
    public static function pg(){
        return self::where('type','pg');
    }

    // Get undergraduage programs
    public static function ug(){
        return self::where('type','ug');
    }

    // Get related college
    public function college(){
        return $this->belongsTo(College::class);
    }
}

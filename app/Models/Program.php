<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lecture_id',
    ];

    // RELATIONSHIPS
    // Get related Lecture
    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }

    // FUNCTIONS

    // STATIC FUNCTIONS
}

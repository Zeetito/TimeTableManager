<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'attednace_id',
        'user_id',
        'marked_by',
    ];
}

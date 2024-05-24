<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroupUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_group_id',
        'user_id'
    ];
}

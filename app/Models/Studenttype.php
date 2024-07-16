<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studenttype extends Model
{
    // use HasFactory;

    protected $fillable = [
        'student_type_id',
        'student_type_label',
        'created_at',
        'updated_at'
    ];
}

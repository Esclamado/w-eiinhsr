<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentsection extends Model
{
    // use HasFactory;
    protected $fillable = [
        'student_section_id',
        'student_section_label',
        'created_at',
        'updated_at'
    ];
}

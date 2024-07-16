<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    // use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'address',
        'age',
        'enrollment_status',
        'grade_school',
        'student_status',
        'school_year_start',
        'school_year_end',
        'created_at',
        'updated_at',
        'student_type',
        'student_sections',
        'middle_name',
        'name_extn',
        'birthdate',
        'sex',
    ];
}

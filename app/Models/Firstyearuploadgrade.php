<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firstyearuploadgrade extends Model
{
    // use HasFactory;


    protected $fillable = [
        'student_id',
        'grade_school',
        'grading_period',
        'enrollment_status',
        'school_year_start',
        'school_year_end',
        'mathematics',
        'science',
        'english',
        'ap',
        'esp',
        'filipino',
        'tle',
        'music',
        'arts',
        'pe',
        'health',
        'research',
        'created_at',
        'updated_at'
    ];

}

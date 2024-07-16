<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradingperiod extends Model
{
    // use HasFactory;
    protected $fillable = [
        'grading_period_id',
        'grading_period_label',
        'created_at',
        'updated_at'
    ];
}

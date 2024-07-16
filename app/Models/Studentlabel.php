<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentlabel extends Model
{
    // use HasFactory;

    protected $fillable = [
        'student_status_id',
        'student_status_label',
        'created_at',
        'updated_at'
    ];
}

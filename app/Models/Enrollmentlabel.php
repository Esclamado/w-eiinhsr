<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollmentlabel extends Model
{
    // use HasFactory;

    protected $fillable = [
        'enrollment_status_id',
        'enrollment_status_label',
        'created_at',
        'updated_at'
    ];
}

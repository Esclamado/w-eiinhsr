<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradeschool extends Model
{
    // use HasFactory;
    protected $fillable = [
        'gr_school',
        'gr_school_id',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_id',
        'academic_year_id',
        'semester_name',
        's_start',
        's_end'
    ];
}

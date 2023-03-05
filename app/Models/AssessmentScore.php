<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'student_regi_no',
        'course_code',
        'score'
    ];
}

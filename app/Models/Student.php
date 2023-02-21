<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    // public $incrementing = false;

    protected $fillable = [
        'student_id',
        'student_name',
        'program_id',
        'password',
        'email',
        'year_of-study',
        'current_semester',
        'enrollment_year'
    ];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->uuid = IdGenerator::generate(['table' => 'students', 'length' => 6, 'prefix' =>date('y')]);
    //     });
    // }
}

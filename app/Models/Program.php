<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id', 
        'department_id',
        'program_code', 
        'program_name'
    ];

     /**
     * Get the department that owns the program.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'program_id', 'department_id');
    }
}

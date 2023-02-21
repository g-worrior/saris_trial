<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'department_name'
    ];

    /**
     * The programs that belong to the department.
     */
    public function programs()
    {
        return $this->hasMany(Program::class, 'department_id', 'program_id');
    }
}

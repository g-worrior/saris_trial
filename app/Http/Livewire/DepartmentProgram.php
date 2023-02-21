<?php

namespace App\Http\Livewire;

use App\Models\Program;
use Livewire\Component;
use App\Models\Department;

class DepartmentProgram extends Component
{
    
    public $selectedDepartment = NULL;
    public $programs = NULL;

    public function render()
    {
        $departments = Department::all();
        return view('livewire.department-program', \compact('departments'));
    }

    public function updatedselectedDepartment($department_id)
    {
        $this->programs = Program::where('department_id', $department_id)->get();
    }
}

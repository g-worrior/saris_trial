<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class EditDepartment extends Component
{
    public $departmentId;
    public $department;

    public function mount($departmentId)
    {
        $this->departmentId = $departmentId;
        $this->department = Department::where('department_id', $this->departmentId)->first();
    }

    public function render()
    {
        return view('livewire.edit-department');
    }
}

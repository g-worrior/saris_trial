<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class GetDepartment extends Component
{
    public function render()
    {
        $departments = Department::all();
        return view('livewire.get-department', \compact('departments'));
    }
}

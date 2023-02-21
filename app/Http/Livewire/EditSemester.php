<?php

namespace App\Http\Livewire;

use App\Models\Semester;
use Livewire\Component;

class EditSemester extends Component
{
    public $semesterId;
    public $semester;

    public function mount($semesterId)
    {
        $this->semesterId = $semesterId;
        $this->semester = Semester::where('semester_id', $semesterId)->first();
    }
    public function render()
    {
        return view('livewire.edit-semester');
    }
}

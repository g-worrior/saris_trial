<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class GetStudent extends Component
{
    public $studentId;
    public $student;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->student = Student::where('student_id', $this->studentId)->first();
    }
    public function render()
    {
        return view('livewire.get-student');
    }
}

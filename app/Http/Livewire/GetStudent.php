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
        $this->student = Student::where('student_regi_no', $this->studentId)
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('programs', 'programs.program_id', '=', 'students.program_id')
            ->join('departments', 'departments.department_id', '=', 'programs.department_id')
            ->join('guardians', 'guardians.guardian_id', '=', 'students.guardian_id')
            ->join('emergency_contacts', 'emergency_contacts.emergency_contact_id', '=', 'students.emergency_contact_id')
            ->first();
    }
    public function render()
    {
        return view('livewire.get-student');
    }
}
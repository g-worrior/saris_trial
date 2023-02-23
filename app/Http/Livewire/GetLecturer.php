<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lecturer;

class GetLecturer extends Component
{
    public $lecturerId;
    public $lecturer;

    public function mount($lecturerId)
    {
        $this->lecturerId = $lecturerId;
        $this->lecturer = Lecturer::where('lecturer_id', $this->lecturerId)->first();
    }
    public function render()
    {
        return view('livewire.get-lecturer');
    }
}

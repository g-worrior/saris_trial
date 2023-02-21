<?php

namespace App\Http\Livewire;

use App\Models\Program;
use Livewire\Component;

class EditProgram extends Component
{
    public $programId;
    public $program;

    public function mount($programId)
    {
        $this->programId = $programId;
        $this->program = Program::where('program_id', $this->programId)->first();
    }

    public function render()
    {
        return view('livewire.edit-program');
    }
}

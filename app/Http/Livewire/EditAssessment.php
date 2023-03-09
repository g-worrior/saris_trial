<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Assessment;

class EditAssessment extends Component
{
    public $assessmentId;
    public $assessment;

    public function mount($assessmentId)
    {
        $this->assessmentId = $assessmentId;
        $this->assessment = Assessment::where('assessment_id', $this->assessmentId)->first();
    }
    public function render()
    {
        return view('livewire.edit-assessment');
    }
}

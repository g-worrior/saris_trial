<?php

namespace App\Http\Livewire;

use App\Models\AcademicYear;
use Livewire\Component;

class EditAcademicYear extends Component
{
    public $academicyearId;
    public $academic_year;

    public function mount($academicyearId)
    {
        $this->academicyearId = $academicyearId;
        $this->academic_year = AcademicYear::where('academic_year_id', $this->academicyearId)->first();
    }


    public function render()
    {
        return view('livewire.edit-academic-year');
    }
}

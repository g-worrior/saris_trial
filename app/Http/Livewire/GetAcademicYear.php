<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\DB;

class GetAcademicYear extends Component
{
    public function render()
    {
        $academic_year = AcademicYear::all(['academic_years.*', DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")]);
        return view('livewire.get-academic-year', \compact('academic_year'));
    }
}
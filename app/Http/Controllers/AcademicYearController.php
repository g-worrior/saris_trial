<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicYearController extends Controller
{
    //get all academic years
    public function index()
    {
        $academic_years = AcademicYear::all(['academic_years.*', DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")]);

        return view('admin.academic-years', compact('academic_years'));
    }

    //add academic year
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        AcademicYear::create([
            'academic_year_id' => 3,
            'a_start_year' => $request->start_date ,
            'a_end_year' =>  $request->end_date
        ]);

        return redirect()->back()->with('success', 'Academic Year Added Successfully.');
    }

    //update an academic year
    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'a_start_year' => 'required|date',
            'a_end_year' => 'required|date'
        ]);

        AcademicYear::where('academic_year_id', $request->academic_year_id)->update([
            'a_start_year' => $request->a_start_year,
            'a_end_year' => $request->a_end_year
        ]);

        return redirect()->back()->with('success', 'Academic Year Updated Successfully.');
    }
}
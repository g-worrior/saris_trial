<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    //get list of semesters
    public function index()
    {
        $semesters = Semester::join('academic_years', 'academic_years.academic_year_id', '=', 'semesters.academic_year_id')
            ->orderBy('s_end', 'ASC')
            ->orderBy('s_start', 'DESC')
            ->get(['semesters.*', DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")]);

        return view('admin.semesters', compact('semesters'));
    }

    //add a semester
    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required|integer',
            'semester_name' => 'required|string',
            'start_date' =>'required|date',
            'end_date' => 'required|date'
        ]);

        Semester::create([
            'semester_id' => 4,
            'academic_year_id' => $request->academic_year_id,
            'semester_name' => $request->semester_name,
            's_start' => $request->start_date,
            's_end' => $request->end_date
        ]);

        return redirect()->back()->with('success', 'Semester Added Successfully.');

    }

    //update a semester
    public function update(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'integer|nullable',
            'semester_name' => 'string',
            's_start' => 'date',
            's_end' => 'date'

        ]);

        if($request->academic_year_id)
        {
            Semester::where('semester_id', $request->semester_id)->update([
                'academic_year_id' => $request->academic_year_id
            ]);
        }

        Semester::where('semester_id', $request->semester_id)->update([
            'semester_name' => $request->semester_name,
            's_start' => $request->s_start,
            's_end' => $request->s_end
        ]);

        return redirect()->back()->with('success', 'Semester Updated Successfully.');


    }
}
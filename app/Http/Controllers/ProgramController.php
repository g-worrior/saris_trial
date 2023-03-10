<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //get programs
    public function index()
    {
        $programs = Program::join('departments', 'programs.department_id', '=', 'departments.department_id')->get();

        return view('admin.programs', compact('programs'));
    }

    // add a program
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required|string|max:255',
            'department_id' => 'required',
            'program_code' => 'required|string|max:255',
        ]);

        Program::create([
            'program_id' => 3,
            'department_id' => $request->department_id,
            'program_code' => $request->program_code,
            'program_name' => $request->program
        ]);

        return redirect()->back()->with('success', 'Program added Successfully.');
    }

    // update a program
    public function update(Request $request)
    {
        
        if ($request->department_id) {
            Program::where('program_id', $request->program_id)->update([
                'department_id' => $request->department_id
            ]);
        }

        Program::where('program_id', $request->program_id)->update([
            'program_name' => $request->program_name,
            'program_code' => $request->program_code
        ]);


        return redirect()->back();
    }
}
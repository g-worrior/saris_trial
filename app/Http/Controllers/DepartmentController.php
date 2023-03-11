<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    // get departments
    public function index()
    {
        $departments = Department::all();

        return view('admin.departments', compact('departments'));
    }

    // add a department
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
        ]);

        Department::create([
            'department_name' => $request->department
        ]);

        return redirect()->back()->with('success', 'Department added Successfully.');
    }


    // update a department
    public function update(Request $request)
    {
        $request->validate([
            'department_id' => 'required|',
            'department_name' => 'required|string|max:255',
        ]);

        Department::where('department_id', $request->department_id)->update([
            'department_name' =>$request->department_name
        ]);

        return redirect()->back()->with('success', 'Department Updated Successfully.');
    }

    // delete a department
    public function destroy()
    {

    }
}
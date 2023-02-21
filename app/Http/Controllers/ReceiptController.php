<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = Receipt::join('students', 'students.student_regi_no', '=', 'receipts.student_regi_no')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->select('receipts.student_regi_no', 'receipts.receipt_id', 'receipts.receipt_amount', 'users.name', 'students.year_of_study')
            ->get();

        return view('admin.receipts', compact('receipts'));
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'invoice_id' => 'required|integer',
            'student_regi_no' => 'required|string',
            'receipt_amount' => 'required|integer'
        ]);

        Receipt::create([
            'invoice_id' => $request->invoice_id,
            'student_regi_no' => $request->student_regi_no,
            'receipt_amount' => $request->receipt_amount
        ]);

        return redirect()->back()->with('success', 'Receipt Added Successfully.');
    }

    public function update(Request $request)
    {
        // return $request;

        $request->validate([
            'receipt_id' => 'integer',
            'student_regi_no' => 'string',
            'receipt_amount' => 'integer'
        ]);

        if ($request->invoice_id) {
            Receipt::where('receipt_id', $request->receipt_id)->update([
                'invoice_id' => $request->invoice_id
            ]);
        }
        Receipt::where('receipt_id', $request->receipt_id)->update([
            'student_regi_no' => $request->student_regi_no,
            'receipt_amount' => $request->receipt_amount
        ]);

        return redirect()->back()->with('success', 'Receipt Updated Successfully.');
    }
}
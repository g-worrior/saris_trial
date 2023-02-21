<?php

namespace App\Http\Controllers;


use App\Models\Invoice;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function index()
    {
        //getting balance for each invoice
        // $balances = DB::table('students')
        //     ->leftJoin('student_invoices', 'students.student_regi_no', '=', 'student_invoices.student_regi_no')
        //     ->leftJoin('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
        //     ->leftJoin(DB::raw('(SELECT invoice_id, SUM(receipt_amount) AS total_received FROM receipts GROUP BY invoice_id) AS receipts_total'), 'invoices.invoice_id', '=', 'receipts_total.invoice_id')
        //     ->select('students.student_regi_no', 'invoices.invoice_id', DB::raw('SUM(invoices.invoice_amount) - COALESCE(receipts_total.total_received, 0) AS balance'))
        //     ->groupBy('students.student_regi_no', 'invoices.invoice_id')
        //     ->get();

        $balances = DB::table('students')
            ->Join('users', 'students.user_id', '=', 'users.id')
            ->leftJoin('student_invoices', 'students.student_regi_no', '=', 'student_invoices.student_regi_no')
            ->leftJoin('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
            ->leftJoin(DB::raw('(SELECT student_regi_no, SUM(receipt_amount) AS total_received FROM receipts GROUP BY student_regi_no) AS receipts_total'), 'students.student_regi_no', '=', 'receipts_total.student_regi_no')
            ->select('users.name', 'students.year_of_study', 'students.student_regi_no', DB::raw('SUM(invoices.invoice_amount) - COALESCE(receipts_total.total_received, 0) AS balance'))
            ->groupBy('students.student_regi_no', 'users.name', 'students.year_of_study')
            ->get();
        $receipts = Receipt::all();

        //get all invoice for selection when adding a receipt ordering to get the latest on top
        $invoices = Invoice::orderBy('invoice_identification')->get();


        return view('admin.accounts', compact('balances', 'invoices'));
    }
}
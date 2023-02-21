<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Invoice;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    //get all invoices
    public function index()
    {
        $invoices = Invoice::join('academic_years', 'invoices.academic_year_id', '=', 'academic_years.academic_year_id')
            ->get([
                'invoices.*',
                DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")
            ]);

        $academic_years = AcademicYear::OrderBy('academic_year', 'DESC')
        ->get([
            'academic_years.academic_year_id',
            DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")
        ]);

        return view('admin.invoices', compact('invoices', 'academic_years'));
    }

    //get all invoices to undergraduate
    public function getInvoiceStudent()
    {
        

        return view('admin.student-invoice');
    }

    //insert new undergraduate invoice relation for academic year
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'academic_year_id' => 'integer',
            'invoice_amount' => 'integer'
        ]);
        $suffix = $request->academic_year;
        $invoice_ident = IdGenerator::generate(['table' => 'invoices', 'field' => 'invoice_identification', 'length' => 7, 'prefix' => 'INV-']);
        $invoice_identification = $invoice_ident . "-For-". $suffix;
        Invoice::create([
            'invoice_identification' => $invoice_identification,
            'academic_year_id' => $request->academic_year_id,
            'invoice_amount' => $request->invoice_amount,
        ]);
        return redirect()->back()->with('success', 'Invoice Added Successfully.');
    }
}
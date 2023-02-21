<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\Receipt;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class StudentFeesStatement extends Component
{
    public $student_regi_no;
    public $fees_statement;
    public $balance;
    public function mount($student_regi_no)
    {
        $balance = DB::table('students')
            ->Join('users', 'students.user_id', '=', 'users.id')
            ->leftJoin('student_invoices', 'students.student_regi_no', '=', 'student_invoices.student_regi_no')
            ->leftJoin('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
            ->leftJoin(DB::raw('(SELECT student_regi_no, SUM(receipt_amount) AS total_received FROM receipts GROUP BY student_regi_no) AS receipts_total'), 'students.student_regi_no', '=', 'receipts_total.student_regi_no')
            ->select('users.name', 'students.year_of_study', 'students.student_regi_no', DB::raw('SUM(invoices.invoice_amount) - COALESCE(receipts_total.total_received, 0) AS balance'))
            ->groupBy('students.student_regi_no', 'users.name', 'students.year_of_study')
            ->where('students.student_regi_no', $student_regi_no)
            ->first()
            ->balance;

        $invoices = Invoice::join('student_invoices', 'invoices.invoice_id', '=', 'student_invoices.invoice_id')
            ->where('student_invoices.student_regi_no', $student_regi_no)
            ->select('invoices.*', 'invoices.invoice_identification')
            ->get();

        $receipts = Receipt::join('invoices', 'receipts.invoice_id', '=', 'invoices.invoice_id')
            ->join('student_invoices', 'invoices.invoice_id', '=', 'student_invoices.invoice_id')
            ->where('student_invoices.student_regi_no', $student_regi_no)
            ->where('receipts.student_regi_no', $student_regi_no)
            ->select('receipts.*', 'invoices.invoice_amount')
            ->orderBy('receipts.created_at')
            ->get();

        $fees_statement = [];

        foreach ($invoices as $invoice) {
            $receipts_for_invoice = $receipts->where('invoice_id', $invoice->invoice_id);

            $invoice_item = [
                'type' => 'invoice',
                'created_at' => $invoice->created_at,
                'description' => $invoice->invoice_identification,
                'amount' => $invoice->invoice_amount
            ];

            $fees_statement[] = $invoice_item;

            foreach ($receipts_for_invoice as $receipt) {
                $receipt_item = [
                    'type' => 'receipt',
                    'created_at' => $receipt->created_at,
                    'description' => 'Receipt',
                    'amount' => $receipt->receipt_amount
                ];

                $fees_statement[] = $receipt_item;
            }
        }

        $fees_statement = collect($fees_statement)->sortBy('created_at')->values()->all();

        $this->fees_statement = $fees_statement;
        $this->balance = $balance;
    }
    public function render()
    {
        return view('livewire.student-fees-statement');
    }
}

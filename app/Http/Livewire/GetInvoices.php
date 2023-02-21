<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class GetInvoices extends Component
{
    public $invoices;

    public function mount()
    {
        $this->invoices = Invoice::OrderBy('invoice_identification', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.get-invoices');
    }
}

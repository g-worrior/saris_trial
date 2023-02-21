<?php

namespace App\Http\Livewire;

use App\Models\Receipt;
use Livewire\Component;

class EditReceipt extends Component
{
    public $receiptId;
    public $receipt;

    public function mount($receiptId)
    {
        $this->receiptId = $receiptId;
        $this->receipt = Receipt::where('receipt_id', $this->receiptId)->first();
    }
    public function render()
    {
        return view('livewire.edit-receipt');
    }
}

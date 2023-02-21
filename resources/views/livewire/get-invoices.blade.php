<div class="col form-group">
    <label for="">Invoice Identification</label>
    <select class="form-control" name="invoice_id" id="">
        <option value="">--Select invoice---</option>
        @foreach ($invoices as $invoice )
            <option value="{{ $invoice->invoice_id }}">{{ $invoice->invoice_identification }}</option>
        @endforeach
    </select>
    </div>
<form action="/access/update-receipt" method="POST">
    @csrf
    <div class="modal-body">
        <div>


            <input type="hidden" name="receipt_id" id="receipt_id" value="{{ $receipt->receipt_id }}">
            @livewire('get-invoices')
            <div col-sm-5>
                <label for="name">Student RegNo</label>
                <input class="form-control" type="text" name="student_regi_no" id="student_regi_no"
                    value="{{ $receipt->student_regi_no }}">
            </div>            
            <div col-sm-5>
                <label for="name">Receipt Amount</label>
                <input class="form-control" type="text" name="receipt_amount" id="receipt_amount"
                    value="{{ $receipt->receipt_amount }}">
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

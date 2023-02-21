<form action="/access/update-academic-year" method="POST">
    @csrf
    <div class="modal-body">
        <div>

           
            <input type="hidden" name="academic_year_id" id="academic_year_id" value="{{ $academic_year->academic_year_id }}">
            <div col-sm-5>
                <label for="name">Start Year</label>
                <input class="form-control" type="date" name="a_start_year" id="a_start_year" value="{{ $academic_year->a_start_year }}">
                @error('a_start_year')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div col-sm-5>
                <label for="name">End Year</label>
                <input class="form-control" type="date" name="a_end_year" id="a_end_year" value="{{ $academic_year->a_end_year }}">
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

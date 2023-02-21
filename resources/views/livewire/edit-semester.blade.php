<form action="/access/update-semester" method="POST">
    @csrf
    <div class="modal-body">
        <div>

           
            <input type="hidden" name="semester_id" id="semester_id" value="{{ $semester->semester_id }}">
            <div col-sm-5>
                <label for="name">Semester Name</label>
                <input class="form-control" type="text" name="semester_name" id="semester_name" value="{{ $semester->semester_name }}">
            </div>
            @livewire('get-academic-year')            
            <div col-sm-5>
                <label for="name">Semester Start Date</label>
                <input class="form-control" type="date" name="s_start" id="s_start" value="{{ $semester->s_start }}">
            </div>            
            <div col-sm-5>
                <label for="name">Semester End Date</label>
                <input class="form-control" type="date" name="s_end" id="s_end" value="{{ $semester->s_end }}">
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

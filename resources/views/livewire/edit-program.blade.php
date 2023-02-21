<form action="/access/update-program" method="POST">
    @csrf
    <div class="modal-body">
        <div>

           
            <input type="hidden" name="program_id" id="program_id" value="{{ $program->program_id }}">
            <div col-sm-5>
                <label for="name">Program Name</label>
                <input class="form-control" type="text" name="program_name" id="program_name" value="{{ $program->program_name }}">
            </div>
            @livewire('get-department')
            <div col-sm-5>
                <label for="name">Program Name</label>
                <input class="form-control" type="text" name="program_code" id="program_code" value="{{ $program->program_code }}">
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

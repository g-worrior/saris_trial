<form action="/access/update-department" method="POST">
    @csrf
    <div class="modal-body">
        <div>

           
            <input type="hidden" name="department_id" id="department_id" value="{{ $department->department_id }}">
            <div col-sm-5>
                <label for="name">Department Name</label>
                <input class="form-control" type="text" name="department_name" id="department_name" value="{{ $department->department_name }}">
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

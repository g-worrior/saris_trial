<div class="col form-group">
<label for="">Department Name</label>
<select class="form-control" name="department_id" id="">
    <option value="">--Select department---</option>
    @foreach ($departments as $department )
        <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
    @endforeach
</select>
</div>

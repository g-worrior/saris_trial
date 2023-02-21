<div class="col form-group">
    <label for="">Academic Year</label>
    <select class="form-control" name="academic_year_id" id="">
        <option value="">--Select academic year---</option>
        @foreach ($academic_year as $academic_year)
            <option value="{{ $academic_year->academic_year_id }}">{{ $academic_year->academic_year }}</option>
        @endforeach
    </select>
</div>

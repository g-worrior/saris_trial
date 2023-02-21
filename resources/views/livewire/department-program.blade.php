<div>
    <div class="row">
        <div class="col">
            <label for="">Department</label>
            <select class="form-control" name="department_id" id="" wire:model="selectedDepartment">
                <option value="">--- Select Department ---</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if (!is_null($programs))
        <div class="row">
            <div class="col">
                <label for="">Program</label>
                <select class="form-control" name="department_id" id="" wire:model="selectedDepartment">
                    <option value="">--- Select Program ---</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->program_id }}">{{ $program->program_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

</div>
{{-- <div>
    <div class="form-group row">
        <label for="department" class="col-lg-3 col-form-label">{{ __('Department') }}</label>

        <div class="col-lg-9">
            <select wire:model="selectedDepartment" class="form-control" name="department"
                data-validator-label="Department" data-validator="required">
                <option value="" selected>---Choose Department---</option>
                @foreach ((array) $departments as $departments)
                    <option value="{{ $departments->department_id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
            <div class="form-control-feedback"></div>
        </div>
    </div>

    @if (!is_null($selectedDepartment))
        <div class="form-group row">
            <label for="state" class="col-lg-3 col-form-label">{{ __('Program') }}</label>

            <div class="col-lg-9">
                <select wire:model="selectedprogram" class="form-control" name="program"
                data-validator-label="Program" data-validator="required">
                    <option value="" selected>---Choose Program---</option>
                    @foreach ((array) $programs as $programs)
                        <option value="{{ $programs->program_id }}">{{ $program->program_name }}</option>
                    @endforeach
                </select>
                <div class="form-control-feedback"></div>
            </div>
        </div>
    @endif
</div> --}}

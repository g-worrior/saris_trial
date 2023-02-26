<div class="row">
    <label for="">User Role</label>
    <select name="role" id="" class="form-control">
        <option value="">--Select user Role---</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
</div>

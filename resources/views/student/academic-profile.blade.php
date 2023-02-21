@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="content">
        <br>
        <div class="card">
            <div class="card-head">
                <h4>Academic Profile</h4>
            </div>
            <div class="card-body">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="row" style="float: none; margin: 0 auto;">
                            <img style="width: 80px;" class="rounded-circle "
                                src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" alt="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">{{ Auth::user()->name }}</label>
                        <input class="form-control" type="text" value="Ohalha Likoswe" readonly>
                    </div>
                    <div class="col">
                        <label for="">Gender</label>
                        <input class="form-control" type="text" value="{{ $student->gender }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Date of birth</label>
                        <input class="form-control" type="text" value="{{ $student->dob }}" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Admission year</label>
                        <input class="form-control" type="text" value="{{ $student->enrollment_year }}" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Year of study</label>
                        <input type="text" class="form-control" value="{{ $student->year_of_study }}" readonly>
                    </div>
                </div>
                <div class="row">

                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h4>Program of study</h4>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <label for="">Department name</label>
                            <input class="form-control" type="text" value="{{ $student->department_name }}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Program code</label>
                            <input class="form-control" type="text" value="{{ $student->program_code }}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Program name</label>
                            <input class="form-control" type="text" value="{{ $student->program_name }}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Registration number</label>
                            <input value="{{ $student->student_regi_no }}" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h4>Contact details</h4>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <label for="">Phone number</label>
                            <input type="text" class="form-control" value="{{ $student->s_phone1 }}" readonly>
                        </div>
                        @if ($student->s_phone2 != NULL)
                            <div class="col">
                                <label for="">Secondary number</label>
                                <input type="text" class="form-control" value="{{ $student->s_phone2 }}" readonly>
                            </div>
                        @endif

                        <div class="col">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h4>Guardian details</h4>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <label for="">Title</label>
                            <input value="{{ $student->g_title }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Full name</label>
                            <input value="{{ $student->g_name }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Relationship</label>
                            <input value="{{ $student->g_relationship }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Phone number 1</label>
                            <input value="{{ $student->g_phone1 }}" type="text" class="form-control" readonly>
                        </div>
                        @if ($student->g_phone2 != NULL)
                            <div class="col">
                                <label for="">Phone number 2</label>
                                <input value="{{ $student->g_phone2 }}" type="text" class="form-control" readonly>
                            </div>
                        @endif
                        <div class="col">
                            <label for="">District</label>
                            <input value="{{ $student->g_district }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Address</label>
                            <input value="{{ $student->g_address }}" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-head">
                        <h4>Emergency Contact details</h4>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <label for="">Title</label>
                            <input value="{{ $student->e_title }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Full name</label>
                            <input value="{{ $student->e_name }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Relationship</label>
                            <input value="{{ $student->e_relationship }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Phone number 1</label>
                            <input value="{{ $student->e_phone1 }}" type="text" class="form-control" readonly>
                        </div>
                        @if ($student->e_phone2 != NULL)
                        <div class="col">
                            <label for="">Phone number 2</label>
                            <input value="{{ $student->e_phone2 }}" type="text" class="form-control" readonly>
                        </div>
                        @endif                       
                        <div class="col">
                            <label for="">District</label>
                            <input value="{{ $student->e_district }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">Address</label>
                            <input value="{{ $student->e_address }}" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

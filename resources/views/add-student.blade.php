@extends('layouts.app')

@section('styles')
    @livewireStyles
@endsection

@section('content')
    <section class="content">
        <form action="/add-student" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-head ">
                    <h2 style="position: relative; top:5px; left:10px;">PERSONAL DETAILS</h2>
                </div>
                <div class="card-body">
                    <div class="wraper">
                        <div class="row">
                            <div class="col">
                                <img src="/images/default.png" alt="">
                                <input class="" type="file" class="profile-pic" name="profile-pic">
                            </div>

                            <div class="col">
                                <div class="row">
                                    <label for="">Gender</label>
                                </div>
                                <div class="row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                            value="M">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="F">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-7 ">
                            <label for="">Full Name</label>
                            <input name="fullname" type="text" class="form-control" placeholder="Full name"
                                aria-label="First name">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="">Date of Birth</label>
                            <input name="dob" class="form-control" type="date" placeholder="Date of Birth">
                        </div>
                        <div class="col">

                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <h2 style="position: relative; top:5px; left:10px;">PARENT DETAILS</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Title</label>
                            <select class="form-control" name="title" id="">
                                <option value="">Select title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Doc">Doc</option>
                                <option value="Pro">Pro</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="">Full Name</label>
                            <input name="pfullname" type="text" class="form-control" placeholder="Full name"
                                aria-label="Full name">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="">Date of Birth</label>
                            <input name="dob" class="form-control" type="date" placeholder="Date of Birth">
                        </div>
                        <div class="col">
                            <label for="">Relationship</label>
                            <select class="form-control" name="" id="">
                                <option value="">Father</option>
                                <option value="">Mother</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="">Phone Number</label>
                            <input class="form-control" type="text" name="" id=""
                                placeholder="Phone number">
                        </div>
                        <div class="col">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="parentemail" id="">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row row-cols-2 g-3">
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                            <h2 style="position: relative; top:5px; left:10px;">ACADEMIC DETAILS</h2>
                        </div>
                        <div class="card-body">

                            @livewire('department-program')

                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="">Year of Admission</label>
                                    <input class="form-control" type="text" name="enrollment_year" id=""
                                        value="{{ now()->format('Y') }}">
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                            <h2 style="position: relative; top:5px; left:10px;">ACCOUNT INFORMATION</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" id=""
                                        placeholder="Email">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="">Registration No</label>
                                    <input class="form-control" type="text" name="regno" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-secondary" type="submit" value="Submit">
            </div>
        </form>
        {{-- add student form ends here  --}}

    </section>
@endsection


@section('scripts')
    @livewireScripts
@endsection

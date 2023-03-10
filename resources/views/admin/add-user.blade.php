@extends('layouts.app')

@section('styles')
    @livewireStyles
@endsection

@section('title', 'Add User -')
@section('content')
    <section class="content">
        {{-- add lecturer starts here --}}
        <form action="/access/add-user" method="Post" enctype="multipart/form-data">
            @csrf


            <div class="row row-cols-2 g-3">
                <div class="col">
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

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Full Name</label>
                                    <input name="fullname" type="text" class="form-control" placeholder="Full name"
                                        aria-label="Full name">
                                </div>
                            </div>
                            <br>


                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                            <h2 style="position: relative; top:5px; left:10px;">ACCOUNT INFORMATION</h2>
                        </div>
                        <div class="card-body">
                            @livewire('get-roles')
                            <div class="row">
                                <div class="col">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" id=""
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" name="password" id=""
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id=""
                                        placeholder="Confirm Password">
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
        {{-- add lecture form ends here  --}}

    </section>
@endsection


@section('scripts')
    @livewireScripts
@endsection

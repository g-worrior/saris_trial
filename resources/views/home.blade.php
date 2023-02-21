@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font-awesome-v4.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="images/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                {{ __('You are logged in!') }}
                            </p>
                            <!-- Small boxes (Stat box) -->
                            @role('Admin')
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>150</h3>

                                                <p>New Orders</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                                <p>Bounce Rate</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>44</h3>

                                                <p>User Registrations</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>65</h3>

                                                <p>Unique Visitors</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            @endrole
                            <!-- /.row -->

                            <!-- Small boxes (Stat box) -->
                            @role('Student')
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-folder-open-o"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Documents</span>
                                                <span class="info-box-number">20</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        @if ($balance > 0)
                                            <div class="info-box bg-red">
                                                <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Fees Balance</span>
                                                    <span id="balance" class="info-box-number"></span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        @else
                                            <div class="info-box bg-green">
                                                <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Fees Overpay</span>
                                                    <span id="balance" class="info-box-number"></span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        @endif

                                        <!-- /.info-box -->
                                    </div>

                                </div>
                            @endrole
                            <!-- /.row -->

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

            @role('Student')
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-head">
                                <h4>My Information</h4>
                            </div>
                            <div class="card-body">


                                <br>
                                <div class="row">

                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <div class="row" style="float: none; margin: 0 auto;">
                                                <img style="width: 80px;" class="rounded-circle "
                                                    src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" alt="">
                                            </div>

                                        </div>
                                        <br>
                                        <table class="table ">
                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{ $student->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td>{{ $student->gender }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of birth</th>
                                                <td>{{ $student->dob }}</td>
                                            </tr>
                                            <tr>
                                                <th>Program of study</th>
                                                <td>{{ $student->program_code }}</td>
                                            </tr>
                                            <tr>
                                                <th>Admission year</th>
                                                <td>{{ $student->enrollment_year }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-head">
                                <h4>Registration Board</h4>
                            </div>
                            <div class="card-body">
                                @if ($registered)
                                    <h5 class="btn btn-success"> Already Registered <i class="fa fa-check"></i></h5>
                                    <ul class="list-group">
                                        @foreach ($registered_courses as $course )
                                        <li class="list-group-item">{{ $course->course_name }}</li>
                                        @endforeach
                                        
                                      </ul>
                                @else
                                   <!-- Button trigger modal -->
                                <a href="/student/register" class="btn btn-secondary">
                                    Register here!
                                </a> 
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endrole
        </div>
    </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
@endsection

{{-- print value with commas --}}
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    @role('Student')
    <script>
        const balance = {{ $balance }}
        const result = balance.toLocaleString('en-US');
        document.getElementById("balance").innerHTML = "MK " + result;
    </script>
    @endrole

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

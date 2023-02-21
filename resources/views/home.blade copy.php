@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/font-awesome-v4.css') }}">

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
                                                <img style="width: 70px;" class="rounded-circle "
                                                    src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col">
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
                                <h4>Examination Board</h4>
                            </div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Register here!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endrole
        </div>
    </div><!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/student/register" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="">Academic year</label>
                                <input class="form-control" type="text" name="academic_year" id=""
                                    value="{{ $current_academic_year->academic_year }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="">Semester</label>
                                <input class="form-control" type="text" name="semester"
                                    value="{{ $current_semester->semester_name }}">
                            </div>
                        </div>

                        <div class="container">
                            <h3 class="text-center">Select and Add Items to Your List</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>List of Available Items:</h5>
                                    <select multiple class="form-control" id="itemList">
                                        <option value="item1">Item 1</option>
                                        <option value="item2">Item 2</option>
                                        <option value="item3">Item 3</option>
                                        <option value="item4">Item 4</option>
                                        <option value="item5">Item 5</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <br><br>
                                    <button class="btn btn-success" id="addItemBtn">Add Item</button>
                                    <br><br>
                                    <button class="btn btn-danger" id="removeItemBtn">Remove Item</button>
                                </div>
                                <div class="col-md-5">
                                    <h5>Your Selected Items:</h5>
                                    <ul class="list-group" id="selectedList">
                                    </ul>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    </div>
    <!-- /.content -->
@endsection

{{-- print value with commas --}}
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        const balance = {{ $balance }}
        const result = balance.toLocaleString('en-US');
        document.getElementById("balance").innerHTML = "MK " + result;
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#addItemBtn").click(function() {
                $("#itemList option:selected").each(function() {
                    $("#selectedList").append("<li class='list-group-item'>" + $(this).val() +
                        " <button class='btn btn-danger btn-sm removeBtn'>X</button></li>");

                });
            });
            $("#removeItemBtn").click(function() {
                $("#itemList option:selected").prop("selected", false);
                $("#selectedList li").remove();
            });
            $(document).on("click", ".removeBtn", function() {
                $(this).parent().remove();
            });
        });
    </script>
@endsection

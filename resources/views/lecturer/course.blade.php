@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>My Teaching Courses</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item">My Teaching Courses</li>
                                <li class="breadcrumb-item active">{{ $course->course_code }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h1 class="h2">{{ $course->course_name }}</h1>
            </div>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#assessmenttab">Assessments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#participants">Participants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#gradeReport">Grade Report</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="assessmenttab" class="tab-pane active">
                        <table id="assessment" class="table table-bordered table-striped">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    &nbsp;
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#add-assessment">
                                            <i class='fa fa-plus-circle'></i><small>Add Assessment</small>
                                        </button>
                                    </ol>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Maximum Score</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($assessments as $key => $assessment)
                               <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $assessment->description }}</td>
                                <td>{{ $assessment->type }}</td>
                                <td>{{ $assessment->maximum_score }}</td>
                                <td>{{ $assessment->weight }}</td>
                                <td>
                                    <a href="" class="fa fa-eye"> <small>Grades</small></a><br>
                                    <a href="" class="fa fa-edit"><small>Edit</small></a><br>
                                    <a href="" class="fa fa-trash"><small>Delete</small></a>
                                </td>
                            </tr>                                   
                               @endforeach
                            </tbody>
                        </table>
                        <!--add assessment modal -->
                        <div class="modal fade" id="add-assessment" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Add Assessment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/access/add-assessment" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="col form-group">
                                                <label for="">Description</label>
                                                <input class="form-control" type="text" name="description" id=""
                                                    placeholder="Assessment descriptiom">
                                            </div>
                                            <div class="col form-group">
                                                <label for="">Type</label>
                                                <select class="form-control" name="type" id="">
                                                    <option value="">--Select Assessment Type---</option>
                                                    <option value="Assignment">Assignment</option>
                                                    <option value="MS">Mid Semester</option>
                                                    <option value="EOS">End of Semester</option>
                                                </select>                                            
                                            </div>
                                            <div class="col form-group">
                                                <label for="">Maximum Score</label>
                                                <input class="form-control" type="text" name="maximum_score" id=""
                                                    placeholder="Assessment max score">
                                            </div>
                                            <div class="col form-group">
                                                <label for="">Weight</label>
                                                <input class="form-control" type="text" name="weight" id=""
                                                    placeholder="Assessment weight">
                                            </div>
                                            <div class="col form-group">
                                                <label for="" hidden>Course Code</label>
                                                <input type="text" hidden class="form-control" name="course_code"
                                                    value="{{ $course->course_code }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- add department modal  -->
                    </div>
                    <div id="participants" class="tab-pane">
                        <table id="enrolled" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student RegNo</th>
                                    <th>Fullname</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $student)
                                    <tr>
                                        <td scope="row">{{ ++$key }}</td>
                                        <td>{{ $student->student_regi_no }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Student RegNo</th>
                                    <th>Fullname</th>
                                    <th>Gender</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div id="gradeReport" class="tab-pane">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Reg No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- @foreach ($grades as $grade)
                                        <td>{{ $grade-> }}</td>
                                        <td>{{ $grade-> }}</td>
                                    @endforeach --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#enrolled").DataTable({
                "paging": false,
                "responsive": true,
                "lengthChange": false,
                "searching": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", ]
            }).buttons().container().appendTo('#enrolled_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#assessment").DataTable({
                "responsive": true,
                "searching": false,
                "ordering": true,
            });
        });
    </script>
@endsection

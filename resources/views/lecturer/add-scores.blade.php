@extends('layouts.app')

@section('styles')
@endsection

@section('title', 'Assessment scores -')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Assessment</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item"><a href="/access/my-courses"> My Teaching Courses</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('access.view.course', ['encrypted_code' => Crypt::encrypt($course_code_s)]) }}">{{ $course_code_s }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $assessment->description }}</li>
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
                <h3 class="d-inline-block" style="color: #0f0e0e">{{ $course_name }}</h3>
                <h4 class="d-inline-block ml-2" style="color: #999999">"{{ $assessment->description }}"</h4>


            </div>
            <div class="container mt-3">
                <form action="/access/add-assessment-scores" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <input type="text" hidden name="assessment_id", value="{{ $assessment->assessment_id }}">
                        <table class="table table-striped" id="scores">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Registration Number</th>
                                    <th>Maximum Score</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registered as $registered)
                                    <tr>
                                        <td>{{ $registered->name }}</td>
                                        <td><input type="text" readonly class="form-control col-sm-5"
                                                name="student_regi_no[]" value="{{ $registered->student_regi_no }}"></td>
                                        <td>{{ $registered->maximum_score }}</td>
                                        <td><input type="number" class="form-control" name="grades[]" min="0"
                                                max="100" value="{{ $registered->score }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Add/Update Grades</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
            $("#scores").DataTable({
                "responsive": true,
                "paging": false,
                "searching": false,
            });
        });
    </script>
@endsection

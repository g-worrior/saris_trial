@extends('layouts.app')

@section('styles')
    
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h1 class="h2">{{ $course->course_name }}</h1>
            </div>
            <div class="container mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab1">Tab 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#participants">Participants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#gradeReport">Grade Report</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <p>Content for Tab 1 goes here.</p>
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
@endsection

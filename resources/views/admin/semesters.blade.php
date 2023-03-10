@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('title', 'Semesters -')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Semesters</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Semesters</li>
                                @role('Admin')
                                    <li class="breadcrumb-item">
                                        <a style="position:relative; bottom:4px; left:2px;" class="btn btn-primary"
                                            data-toggle="modal" data-target="#add-semester"> <i class='fa fa-plus-circle'></i>
                                            Add Semester</a>
                                    </li>&nbsp;
                                @endrole
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>List of semesters</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Academic Year</th>
                                        <th scope="col">Semester Name</th>
                                        <th scope="col">Star Date</th>
                                        <th scope="col">End Date</th>
                                        @role('Admin')
                                            <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $key => $semester)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td hidden>{{ $semester->semester_id }}</td>
                                            <td>{{ $semester->academic_year }}</td>
                                            <td>{{ $semester->semester_name }}</td>
                                            <td>{{ $semester->s_start }}</td>
                                            <td>{{ $semester->s_end }}</td>
                                            @role('Admin')
                                                <td>
                                                    {{-- <a href="">
                                                    <li class="fa fa-eye"></li>
                                                </a> --}}
                                                    <a href="" data-toggle="modal"
                                                        data-target="#edit-semester-{{ $semester->semester_id }}"
                                                        wire:click="$set('semesterId', $semester->semester_id)">

                                                        <li class="fa fa-edit"></li>
                                                    </a>
                                                    {{-- <a href="">
                                                    <li class="fa fa-trash"></li>
                                                </a> --}}
                                                </td>
                                            @endrole

                                        </tr>
                                        @role('Admin')
                                            <!-- Edit semester Modal -->
                                            <div class="modal fade" id="edit-semester-{{ $semester->semester_id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Semester
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @livewire('edit-semester', ['semesterId' => $semester->semester_id])

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of edit program modal -->
                                        @endrole
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Academic Year</th>
                                        <th scope="col">Semester Name</th>
                                        <th scope="col">Star Date</th>
                                        <th scope="col">End Date</th>
                                        @role('Admin')
                                            <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        @role('Admin')
            <!--add semester modal -->
            <div class="modal fade" id="add-semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Semester</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/access/add-semester" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="col form-group">
                                    <label for="">Semester Name</label>
                                    <input class="form-control" type="text" name="semester_name" id=""
                                        placeholder="Semester name">
                                </div>
                                @livewire('get-academic-year')

                                <div class="col form-group">
                                    <label for="">Start Date</label>
                                    <input class="form-control" type="date" name="start_date" id=""
                                        placeholder="Start date of semester">
                                </div>
                                <div class="col form-group">
                                    <label for="">End Date</label>
                                    <input class="form-control" type="date" name="end_date" id=""
                                        placeholder="End date of semester">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- add semester modal  -->
        @endrole

    </section>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "info": true,
                "autoWidth": true,
                "responsive": true,

                "buttons": ["copy", "csv", "excel", "pdf", "print", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

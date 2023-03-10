@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('title', 'Academic Years -')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Academic Years</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Academic Years</li>
                                @role('Admin')
                                    <li class="breadcrumb-item">
                                        <a style="position:relative; bottom:4px; left:2px;" class="btn btn-primary"
                                            data-toggle="modal" data-target="#add-department"> <i class='fa fa-plus-circle'></i>
                                            Add Academic Year</a>
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
                            <h4>List of academic years</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Academic Start Date </th>
                                        <th scope="col">Academic End Date</th>
                                        <th scope="col">Academic Year</th>
                                        @role('Admin')
                                            <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($academic_years as $key => $academic_year)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td hidden>{{ $academic_year->academic_year_id }}</td>
                                            <td>{{ $academic_year->a_start_year }}</td>
                                            <td>{{ $academic_year->a_end_year }}</td>
                                            <td>{{ $academic_year->academic_year }}</td>
                                            @role('Admin')
                                                <td>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#edit-academic-year-{{ $academic_year->academic_year_id }}"
                                                        wire:click="$set('academic_yearid', $academic_year->academic_year_id)">
                                                        <li class="fa fa-edit"></li>
                                                    </a>
                                                </td>
                                            @endrole

                                        </tr>
                                        @role('Admin')
                                            <!-- Edit academic year Modal -->
                                            <div class="modal fade"
                                                id="edit-academic-year-{{ $academic_year->academic_year_id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Academic
                                                                Year</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @livewire('edit-academic-year', ['academicyearId' => $academic_year->academic_year_id])

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of edit academic year modal -->
                                        @endrole
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Academic Start Date </th>
                                        <th scope="col">Academic End Date</th>
                                        <th scope="col">Academic Year</th>
                                        @role('Admin')
                                            <th scope="col">Action</th>
                                        @endrole
                                    </tr>
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
            <!--add academic year modal -->
            <div class="modal fade" id="add-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Academic Year</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/access/add-academic-year" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="col form-group">
                                    <label for="">Start Date</label>
                                    <input class="form-control" type="date" name="start_date" id=""
                                        placeholder="Start Date of academic year">
                                </div>
                                <div class="col form-group">
                                    <label for="">End Date</label>
                                    <input class="form-control" type="date" name="end_date" id=""
                                        placeholder="End date of academic year">
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
            <!-- add academic year modal  -->
        @endrole
    </section>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @if ($message = Session::get('success'))
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.success('{{ $message }}')
        </script>
    @endif
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

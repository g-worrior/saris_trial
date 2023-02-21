@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Courses</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Courses</li>
                                <li class="breadcrumb-item">
                                    <a style="position:relative; bottom:4px; left:2px;" class="btn btn-primary"
                                        href="/add-course"> <i class='fa fa-plus-circle'></i>Add Course</a>
                                </li>&nbsp;
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
                            <div>
                                <form name="StudentClass" id="StudentClass" method="post" action="">
                                    <div class="row">
                                        <div class="text-start">
                                            <label class="label label-default">Select Class Name</label>
                                        </div>
                                        &nbsp;&nbsp;
                                        <div class="" style="position:relative; bottom:5px; left:2px;">
                                            <select name="ClassID" id="ClassID" class="form-control">
                                                <option value="all">All</option>
                                                <option value="1">trghet</option>
                                            </select>
                                        </div>
                                        <div class="ml-auto" style="position:relative; bottom:5px;">
                                            <a class="btn btn-secondary" href=""> <i class="fa fa-file-import"></i>
                                                Import</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Code</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Credit Hous</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key => $course)
                                        <tr>
                                            <td scope="row">{{ ++$key }}</td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->credit_hours }}</td>
                                            <td>
                                                <div>
                                                    <a href="" style="color: red" class="fa fa-trash"
                                                        data-toggle="modal" data-target="#deletestudent"></a>
                                                    <a href="" class="fa fa-edit"></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Code</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Credit Hous</th>
                                        <th scope="col">Action</th>
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

        <!-- View student Modal -->
        <div class="modal fade" id="viewstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of view student modal -->

        <!-- Delete student Modal -->
        <div class="modal fade" id="deletestudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of delete student modal -->


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
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print",]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('title', 'Receipts -')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Receipt List</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Fees</li>
                                <li class="breadcrumb-item">
                                    <a style="position:relative; bottom:4px; left:2px;" class="btn btn-primary"
                                        href="" data-toggle="modal" data-target="#add-receipt"> <i
                                            class='fa fa-plus-circle'></i> Add Receipt</a>
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
                            <h4>List of receipts of student</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student RegNo</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Year of Study</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($receipts as $key => $receipt)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td>{{ $receipt->student_regi_no }}</td>
                                            <td>{{ $receipt->name }}</td>
                                            <td>{{ $receipt->year_of_study }}</td>
                                            <td>{{ $receipt->receipt_amount }}</td>
                                            <td>
                                                <a class="edit-button" href="" data-toggle="modal"
                                                    data-target="#edit-receipt-{{ $receipt->receipt_id }}"
                                                    wire:click="$set('receiptId', $receipt->receipt_id)">
                                                    <i class='fa fa-edit'></i>
                                                </a>
                                                <a href="">
                                                    <li class="fa fa-trash"></li>
                                                </a>
                                            </td>

                                        </tr>
                                        <!-- Edit Receipt Modal -->
                                        <div class="modal fade" id="edit-receipt-{{ $receipt->receipt_id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Receipt
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @livewire('edit-receipt', ['receiptId' => $receipt->receipt_id])

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of edit receipt modal -->
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Student RegNo</th>
                                        <th>Fullname</th>
                                        <th>Year of Study</th>
                                        <th>Balance</th>
                                        <th>Action</th>
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

        <!-- add receipt Modal -->
        <div class="modal fade" id="add-receipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add
                            Student Receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/access/add-receipt" method="POST">
                        @csrf
                        <div class="modal-body">
                            @livewire('get-invoices')
                            <div class="col form-group">
                                <label for="">Student Registration Number</label>
                                <input type="text" name="student_regi_no" class="form-control">
                            </div>
                            <div class="col form-group">
                                <label for="">Receipt amount</label>
                                <input type="text" name="receipt_amount" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-secondary">Add
                                Receipt</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <!-- End of add receipt modal -->


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

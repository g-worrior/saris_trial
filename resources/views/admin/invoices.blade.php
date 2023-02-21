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
                            <h1>Invoice List</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Invoices</li>
                                <li class="breadcrumb-item">
                                    <a style="position:relative; bottom:4px; left:2px;" class="btn btn-primary"
                                        href="" data-toggle="modal" data-target="#add-invoice"> <i
                                            class='fa fa-plus-circle'></i> Add Invoice</a>
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
                            <h4>List of students with their fees balances</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">INV NO</th>
                                        <th scope="col">INV ACC YEAR</th>
                                        <th scope="col">INV Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $key => $invoice)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td>{{ $invoice->invoice_identification }}</td>
                                            <td>{{ $invoice->academic_year }}</td>
                                            <td>{{ $invoice->invoice_amount }}</td>
                                            <td>
                                                <a href="">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                                <a href="">
                                                    <li class="fa fa-trash"></li>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">INV NO</th>
                                        <th scope="col">INV ACC YEAR</th>
                                        <th scope="col">INV Amount</th>
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

        <!-- add invoice Modal -->
        <div class="modal fade" id="add-invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add
                            Undergraduate
                            Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/access/add-invoice" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col form-group">
                                <label for="">Academic Year</label>
                                <select name="academic_year_id" id="year" class="form-control">
                                    <option value="1">---Select academic year---
                                    </option>
                                    @foreach ($academic_years as $academic)
                                        <option value="{{ $academic->academic_year_id }}">
                                            {{ $academic->academic_year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="">Invoice amount</label>
                                <input type="text" name="invoice_amount" class="form-control">
                            </div>
                            <div class="col form-group">
                                <input class="form-control" hidden type="text" id="yearInput" name="academic_year"
                                    value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-secondary">Add
                                Invoice</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <!-- End of addnvoice modal -->


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
    <script>
        window.onload = function() {
            var select = document.getElementById('year');
            var input = document.getElementById('yearInput');

            select.addEventListener("change", function() {
                var selectedOption = select.options[select.selectedIndex].textContent;
                input.value = selectedOption;
            });

        }
    </script>
@endsection

@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-head">
                Fees Statement
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>                                
                                <th>Academic Year</th>
                                <th>Payments</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($studentInvoices as $invoices )
                            <tr>
                                
                                    <td>{{ $invoices->invoice_identification }}</td>
                                    <td>{{ $invoices->academic_year }}</td>
                                    <td>{{ $invoices->receipt_amount }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    @if ($balance > 0)
                        <h5 class="alert alert-danger col-sm-4" role="alert" id="fees"></h5>
                    @else
                        <h5 class="alert alert-success col-sm-4" role="alert" id="fees"></h5>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const balance = {{ $balance }}
        const result = balance.toLocaleString('en-US');
        document.getElementById("fees").innerHTML = "Balance MK " + result;
    </script>
@endsection

@extends('layouts.app')

@section('styles')
@endsection

@section('title', 'Fees Statement -')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $student_name }}</h1>
                        &nbsp;
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="/access/students-balance">Balances</a> </li>
                            <li class="breadcrumb-item active">{{ $student_regi_no }}</li>&nbsp;
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
        <div class="card">
            <div class="card-head">
            </div>
            <div class="card-body">
                <div id="printable-content">
                    @livewire('student-fees-statement', ['student_regi_no' => $student_regi_no])
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <!-- Add print button here -->
                    <button class="btn btn-primary" onclick="printContent()">Print Statement</button>
                </div>
            </div>
        </div>
    </div>
</section>
   
    
@endsection


@section('scripts')
<script>
    function printContent() {
        var printContents = document.getElementById("printable-content").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
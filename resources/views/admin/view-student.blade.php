@extends('layouts.app')

@section('styles')
@endsection

@section('title', 'View Student -')
@section('content')
    <!-- Content Header (Page header) -->
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
                                <li class="breadcrumb-item"><a href="/access/students">Students</a> </li>
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
            <div>
                @livewire('get-student', ['studentId' => $student_regi_no])
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection

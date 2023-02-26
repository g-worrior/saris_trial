@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-head">
            </div>
            <div class="card-body">
                @livewire('student-fees-statement', ['student_regi_no' => $student_regi_no])

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection

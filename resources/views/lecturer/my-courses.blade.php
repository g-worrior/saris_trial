@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>My Teaching Courses</h1>
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">My Teaching Courses</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <a
                            href={{ route('access.view.course', ['encrypted_code' => Crypt::encrypt($course->course_code)]) }}>
                            <div class="card mb-3">
                                <img class="card-img-top" src="/images/course.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->course_name }}</h5>
                                    <p class="card-text">{{ $course->course_code }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @if ($loop->iteration % 3 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

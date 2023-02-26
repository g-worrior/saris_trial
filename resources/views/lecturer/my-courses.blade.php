@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <a href={{ route("access.view.course", ['encrypted_code' => Crypt::encrypt($course->course_code)]) }}>
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

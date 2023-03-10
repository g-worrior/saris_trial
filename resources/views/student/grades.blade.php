@extends('layouts.app')

@section('styles')
@endsection

@section('title', 'Grades -')
@section('content')
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/images/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>

    <div class="content-body">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            .fade-in {
                animation: fade-in 1s ease-in-out;
            }

            @keyframes fade-in {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            .remark-fail {
                background-color: red;
            }

            .remark-pass {
                background-color: green;
            }

            .remark-credit {
                background-color: green;
            }

            .remark-distinct {
                background-color: green;
            }
        </style>

        <table class="table table-bordered fade-in">
            <tr>
                <th colspan="4">Grade Transcript</th>
            </tr>
            <tr>
                <th>Academic Year</th>
                <th>Semester Name</th>
                <th>Courses Code</th>
                <th>Course Name</th>
                <th>Grade</th>
                <th>Remark</th>
            </tr>
            @foreach ($formatted_results as $academic_year => $semesters)
                @foreach ($semesters as $semester_name => $courses)
                    <tr>
                        <td rowspan="{{ count($courses) + 1 }}">{{ $academic_year }}</td>
                        <td rowspan="{{ count($courses) + 1 }}">{{ $semester_name }}</td>
                    </tr>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['course_code'] }}</td>
                            <td>{{ $course['course_name'] }}</td>
                            <td>{{ $course['grade'] }}</td>
                            <td
                                class="{{ $course['grade'] < 50 ? 'remark-fail' : ($course['grade'] >= 50 && $course['grade'] <= 65 ? 'remark-pass' : ($course['grade'] >= 66 && $course['grade'] <= 75 ? 'remark-credit' : 'remark-distinct')) }}">
                                {{ $course['grade'] < 50 ? 'Sup' : ($course['grade'] >= 50 && $course['grade'] <= 65 ? 'Pass' : ($course['grade'] >= 66 && $course['grade'] <= 75 ? 'Credit' : 'Distinct')) }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </table>

    </div>
@endsection

@section('scripts')
@endsection

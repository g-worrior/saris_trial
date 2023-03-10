@extends('layouts.app')

@section('styles')
@endsection

@section('title', 'Academic Profile -')
@section('content')
    <div class="content">
       <div class="card">
            
        <div class="card-body">
            <h3  class="card-title text-bold">Academic Profile</h3>
            <div class="container mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#student-details">Student Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact-details">Contact Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#academic-details">Academic Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#guardian">Guardian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#emergency-contact">Emergency Contact</a>
                    </li>
                </ul>
            
                <div class="tab-content mt-3">
                    <div id="student-details" class="tab-pane fade show active">
                        <h3>Student Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Date of Birth:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->dob }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Gender:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->gender }}</p>
                            </div>
                        </div>
                    </div>
            
                    <div id="contact-details" class="tab-pane fade">
                        <h3>Contact Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Phone Number 1:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->s_phone1 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Phone Number 2:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->s_phone2 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Email:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->email }}</p>
                            </div>
                        </div>
                    </div>
            
                    <div id="address" class="tab-pane fade">
                        <h3>Address</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Home of Origin:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->s_district_of_origin }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Village:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->s_home_village }}e</p>
                            </div>
                            <div class="col-md-4">
                                <p>Current District:</p>
                            </div>
                            <div class="col-md-4">
                                <p>{{ $student->s_current_district }}</p>
                            </div>
                        </div>
                    </div>
                    <div id="academic-details" class="tab-pane fade">
                        <h3>Academic Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Department of Study:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->department_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Program of Study:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->program_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Enrollment Year:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->enrollment_year }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Year of Study:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->year_of_study }}</p>
                            </div>
                        </div>
                    </div>
            
                    <div id="guardian" class="tab-pane fade">
                        <h3>Guardian</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Title:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_title }}.</p>
                            </div>
                            <div class="col-md-4">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Relationship:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_relationship }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Phone Number 1:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_phone1 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Phone Number 2:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_phone2 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>District:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_district }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Address:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->g_address }}</p>
                            </div>
                        </div>
                    </div>
                    <div id="emergency-contact" class="tab-pane fade">
                        <h3>Emergency Contact</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Title:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_title }}.</p>
                            </div>
                            <div class="col-md-4">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Relationship:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_relationship }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Phone Number 1:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_phone1 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Phone Number 2:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_phone2 }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>District:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_district }}</p>
                            </div>
                            <div class="col-md-4">
                                <p>Address:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $student->e_address }}</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
            
        </div>
       </div>
    </div>
@endsection

@section('scripts')
@endsection

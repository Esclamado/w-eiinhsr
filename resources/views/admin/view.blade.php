@extends('layouts.app-master')

@section('content')
    @auth
        <div class="py-5 container-fluid">
            <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 mt-3">
                        <div style="font-weight: 700; font-size: larger;">View Enrollment Students</div>
                        <div>
                            <a href="{{ route('admin.index') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                    <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                                </svg>
                                <span>Back</span> 
                            </a>
                        </div>
                    </div>

                    <div style="font-weight: 600; font-size: 18px">Student Information:</div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div>
                                <div>First Name:</div>
                                <p style="font-weight: bold">{{ $view_student->first_name }}</p>
                            </div>

                            <div>
                                <div>Middle Name:</div>
                                <p style="font-weight: bold">{{ $view_student->middle_name ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <div>Last Name:</div>
                                <p style="font-weight: bold">{{ $view_student->last_name }}</p>
                            </div>

                            <div>
                                <div>Name EXTN:</div>
                                <p style="font-weight: bold">{{ $view_student->name_extn ?? 'N/A'}}</p>
                            </div>

                            <div>
                                <div>Sex:</div>
                                @if($view_student->sex == '1')
                                    <p style="font-weight: bold">Male</p>
                                @else
                                    <p style="font-weight: bold">Female</p>
                                @endif
                            </div>

                            <div>
                                <div>Birthdate:</div>
                                <p style="font-weight: bold">{{ date("m/d/Y", strtotime($view_student->birthdate)) }}</p>
                            </div>

                            <div>
                                    <div>Student Curriculum:</div> 
                                @if($view_student->student_type=='1')
                                    <p class="badge badge-primary p-2" style="font-weight: bold">STE - Science Technology Engineer</p>
                                @else
                                    <p class="badge badge-info p-2" style="font-weight: bold">Regular</p>
                                @endif
                            </div>

                            <div>
                                <div>Student Section:</div> 
                                @if($view_student->student_sections=='1')
                                    <p class="badge badge-info p-2">Absolute</p>
                                @elseif($view_student->student_sections=='2')
                                    <p class="badge badge-info p-2">Bright</p>
                                @elseif($view_student->student_sections=='3')
                                    <p class="badge badge-info p-2">Creative</p>
                                @elseif($view_student->student_sections=='4')
                                    <p class="badge badge-info p-2">Dynamic</p>
                                @elseif($view_student->student_sections=='5')
                                    <p class="badge badge-info p-2">Ethica</p>
                                @elseif($view_student->student_sections=='6')
                                    <p class="badge badge-info p-2">Flexible</p>
                                @elseif($view_student->student_sections=='7')
                                    <p class="badge badge-info p-2">Gracious</p>
                                @elseif($view_student->student_sections=='8')
                                    <p class="badge badge-info p-2">Honest</p>
                                @elseif($view_student->student_sections=='9')
                                    <p class="badge badge-info p-2">Immaculate</p>
                                @elseif($view_student->student_sections=='10')
                                    <p class="badge badge-info p-2">Just</p>
                                @else
                                    <p class="badge badge-info p-2">STE</p>
                                @endif
                            </div>
                            
                        </div>

                        <div class="col-6">
                            <div>
                                <div>Learner Reference ID (LRN):</div>
                                <p style="font-weight: bold">{{ $view_student->student_id }}</p>
                            </div>

                            <div>
                                <div>Age:</div>
                                <p style="font-weight: bold">{{ $view_student->age }}</p>
                            </div>
                         
                            <div>
                                <div>Address:</div>
                                <p style="font-weight: bold">{{ $view_student->address }}</p>
                            </div>

                            <div>
                                    <div>Grade School:</div>
                                @if($view_student->grade_school == '1')
                                    <p style="font-weight: bold">Grade 7</p>
                                @elseif($view_student->grade_school == '2')
                                    <p style="font-weight: bold">Grade 8</p>
                                @elseif($view_student->grade_school == '3')
                                    <p style="font-weight: bold">Grade 9</p>
                                @else
                                    <p style="font-weight: bold">Grade 10</p>
                                @endif
                            </div>

                            <div>
                                <div>Student Status:</div>
                                @if($view_student->student_status == '1')
                                    <p style="font-weight: bold">New Student</p>
                                @elseif($view_student->student_status == '2')
                                    <p style="font-weight: bold">Old Student</p>
                                @else
                                    <p style="font-weight: bold">Transferee</p>
                                @endif
                            </div>

                            <div>
                                    <div>Enrollment Status:</div> 
                                @if($view_student->enrollment_status=='1')
                                    <p class="badge badge-success p-2" style="font-weight: bold">Enrolled</p>
                                @else
                                    <p class="badge badge-danger p-2" style="font-weight: bold">Not Enrolled</p>
                                @endif
                            </div>

                            <div class="mt-2">
                                <div>School Year:</div> 
                                <p  style="font-weight: bold">{{ date("Y", strtotime($view_student->school_year_start)) }} - {{ date("Y", strtotime($view_student->school_year_end)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection



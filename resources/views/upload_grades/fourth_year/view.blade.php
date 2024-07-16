@extends('layouts.app-master')

@section('content')
    @auth
    <div class="py-5 container-fluid">
        <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <div style="font-weight: 700; font-size: larger;">View Grades</div>
                    <div class="d-flex">
                        <div class="mr-3">
                            <a class="btn btn-primary" href="{{ URL::to('/upload_grades/fourth_year/view_pdf', $view_student_details->student_id) }}">Export to PDF</a>
                        </div>
                        <div>
                            <a href="{{ route('upload_grades.fourth_year.index') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                    <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                                </svg>
                                <span>Back</span> 
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div>
                            <span style="font-weight: 600">Name:</span>
                            <span style="font-weight: 600">{{ $view_student_details->first_name .' '. $view_student_details->last_name }}</span>  
                        </div>

                        <div>
                            <span style="font-weight: 600">Grade School:</span>
                            @if( $view_student_details->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                            @endif
                        </div>

                        <div>
                            <span style="font-weight: 600">Student Curriculum:</span>
                            @if( $view_student_details->student_type=='1')
                                <span class="badge badge-primary mb-1">STE - Science Technology Engineer</span>
                            @else
                                <span class="badge badge-info mb-1">Regular</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div>
                            <span style="font-weight: 600">Student ID:</span>
                            <span style="font-weight: 600">{{ $view_student_details->student_id }}</span> 
                        </div> 

                        <div class="mt-2" style="font-weight: 600">
                                <span>Student Section:</span> 
                            @if($view_student_details->student_sections=='1')
                                <span class="badge badge-info mb-1">Absolute</span>
                            @elseif($view_student_details->student_sections=='2')
                                <span class="badge badge-info mb-1">Bright</span>
                            @elseif($view_student_details->student_sections=='3')
                                <span class="badge badge-info mb-1">Creative</span>
                            @elseif($view_student_details->student_sections=='4')
                                <span class="badge badge-info mb-1">Dynamic</span>
                            @elseif($view_student_details->student_sections=='5')
                                <span class="badge badge-info mb-1">Ethica</span>
                            @elseif($view_student_details->student_sections=='6')
                                <span class="badge badge-info mb-1">Flexible</span>
                            @elseif($view_student_details->student_sections=='7')
                                <span class="badge badge-info mb-1">Gracious</span>
                            @elseif($view_student_details->student_sections=='8')
                                <span class="badge badge-info mb-1">Honest</span>
                            @elseif($view_student_details->student_sections=='9')
                                <span class="badge badge-info mb-1">Immaculate</span>
                            @elseif($view_student_details->student_sections=='10')
                                <span class="badge badge-info mb-1">Just</span>
                            @else
                                <span class="badge badge-info mb-1">STE</span>
                            @endif
                        </div>
                       
                        <div>
                            <span style="font-weight: 600">School Year:</span>
                            <span style="font-weight: 600">{{  date('d-m-Y', strtotime($view_student_details->school_year_start)) }}</span> 
                            <span>/</span>
                            <span style="font-weight: 600">{{  date('d-m-Y', strtotime($view_student_details->school_year_end)) }}</span> 
                        </div>
                    </div>
                </div>

                <div class="table-responsive mt-5">
                    <table class="table table-responsive-lg mb-0">
                        <thead>
                            <tr>
                            <th class="text-center" style="text-wrap: nowrap"> Grading Period </th>
                                <th class="text-center" style="text-wrap: nowrap"> Mathematics </th>
                                <th class="text-center" style="text-wrap: nowrap"> Science </th>
                                <th class="text-center" style="text-wrap: nowrap"> English </th>
                                <th class="text-center" style="text-wrap: nowrap"> AP </th>
                                <th class="text-center" style="text-wrap: nowrap"> ESP </th>
                                <th class="text-center" style="text-wrap: nowrap"> Filipino </th>
                                <th class="text-center" style="text-wrap: nowrap"> TLE </th>
                                <th class="text-center" style="text-wrap: nowrap"> Music </th>
                                <th class="text-center" style="text-wrap: nowrap"> Arts </th>
                                <th class="text-center" style="text-wrap: nowrap"> PE </th>
                                <th class="text-center" style="text-wrap: nowrap"> Health </th>
                                @if($view_student_details->student_type == '1')
                                <th class="text-center" style="text-wrap: nowrap"> Research </th>
                                <th class="text-center" style="text-wrap: nowrap"> Advance Physics </th>
                                <th class="text-center" style="text-wrap: nowrap"> Calculus </th>
                                @endif
                                <!-- <th class="text-center" style="font-weight: 800; text-wrap: nowrap"> GPA </th>  -->
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($view_grade_students as $view_grade_student)
                            <tr>
                                <td class="text-center">
                                    @if($view_grade_student->foy_grading_period=='1')
                                        <span class="badge badge-success mb-1">1st Quarter</span>
                                    @elseif($view_grade_student->foy_grading_period=='2')
                                        <span class="badge badge-success mb-1">2nd Quarter</span>
                                    @elseif($view_grade_student->foy_grading_period=='3')
                                        <span class="badge badge-success mb-1">3rd Quarter</span>
                                    @else($view_grade_student->foy_grading_period=='4')
                                        <span class="badge badge-success mb-1">4th Quarter</span>
                                    @endif
                                </td>
                                
                                <td class="text-center"> {{ $view_grade_student->mathematics }}</td>
                                <td class="text-center"> {{ $view_grade_student->science }}</td>
                                <td class="text-center"> {{ $view_grade_student->english }}</td>
                                <td class="text-center"> {{ $view_grade_student->ap }}</td>
                                <td class="text-center"> {{ $view_grade_student->esp }}</td>
                                <td class="text-center"> {{ $view_grade_student->filipino }}</td>
                                <td class="text-center"> {{ $view_grade_student->tle }}</td>
                                <td class="text-center"> {{ $view_grade_student->music }}</td>
                                <td class="text-center"> {{ $view_grade_student->arts }}</td>
                                <td class="text-center"> {{ $view_grade_student->pe }}</td>
                                <td class="text-center"> {{ $view_grade_student->health }}</td>
                                @if($view_student_details->student_type == '1')
                                <td class="text-center"> {{ $view_grade_student->research }}</td>
                                <td class="text-center"> {{ $view_grade_student->advance_physics }}</td>
                                <td class="text-center"> {{ $view_grade_student->calculus }}</td>
                                @endif

                                <!-- @if($view_student_details->student_type == '1')
                                <td class="text-center" style="font-weight: 800;"> {{ round(($view_grade_student->mathematics + $view_grade_student->science + $view_grade_student->english + $view_grade_student->ap + $view_grade_student->esp +
                                    $view_grade_student->filipino + $view_grade_student->tle + $view_grade_student->music + $view_grade_student->arts + $view_grade_student->pe + $view_grade_student->health +
                                    $view_grade_student->research + $view_grade_student->advance_physics + $view_grade_student->calculus) / 14), 2 }}
                                </td>
                                @endif -->

                                <!-- @if($view_student_details->student_type == '2')
                                <td class="text-center" style="font-weight: 800;"> {{ round(($view_grade_student->mathematics + $view_grade_student->science + $view_grade_student->english + $view_grade_student->ap + $view_grade_student->esp +
                                    $view_grade_student->filipino + $view_grade_student->tle + $view_grade_student->music + $view_grade_student->arts + $view_grade_student->pe + $view_grade_student->health) / 11), 2 }}
                                </td>
                                @endif -->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                    <div class="mt-4 mb-4">                                       
                                        <svg xmlns="http://www.w3.org/2000/svg" height="84" width="120" viewBox="0 0 384 512">
                                            <path fill="#cccccc" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/>
                                        </svg>
                                    </div>
                                    No Uploaded Grades.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
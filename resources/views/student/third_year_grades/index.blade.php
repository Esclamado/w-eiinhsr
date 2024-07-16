@extends('layouts.app-master')

@section('content')
    @auth
    <div class="py-5 container-fluid">
        <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <div style="font-weight: 700; font-size: larger;">Dashboard - Grade 9 Student</div>
                    
                    <div class="btn-group mr-3">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View Grades
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('student.first_year_grades.index') }}">Grade 7</a>
                            <a class="dropdown-item" href="{{ route('student.second_year_grades.index') }}">Grade 8</a>
                            <a class="dropdown-item" href="{{ route('student.third_year_grades.index') }}">Grade 9</a>
                            <a class="dropdown-item" href="{{ route('student.fourth_year_grades.index') }}">Grade 10</a>
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
                                @if($view_student_details ? $view_student_details->student_type=='1' : '')
                                <th class="text-center" style="text-wrap: nowrap"> Research </th>
                                <th class="text-center" style="text-wrap: nowrap"> Enhanced Algebra </th>
                                <th class="text-center" style="text-wrap: nowrap"> Advance Chemistry </th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($view_grade_3rd as $view_grade_student)
                            <tr>
                                <td class="text-center">
                                    @if($view_grade_student->ty_grading_period=='1')
                                        <span class="badge badge-success mb-1">1st Quarter</span>
                                    @elseif($view_grade_student->ty_grading_period=='2')
                                        <span class="badge badge-success mb-1">2nd Quarter</span>
                                    @elseif($view_grade_student->ty_grading_period=='3')
                                        <span class="badge badge-success mb-1">3rd Quarter</span>
                                    @else($view_grade_student->ty_grading_period=='4')
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
                                @if($view_student_details->student_type=='1')
                                <td class="text-center"> {{ $view_grade_student->research }}</td>
                                <td class="text-center"> {{ $view_grade_student->enhanced_algebra }}</td>
                                <td class="text-center"> {{ $view_grade_student->advance_chemistry }}</td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">
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
@extends('layouts.app-master')

@section('content')
    @auth
    <div class="py-5 container-fluid">
        <div> 
            @include('layouts.partials.messages')
        </div>

        <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <div style="font-weight: 700; font-size: larger;">Upload Student Grades</div>

                    <div>
                        <a href="{{ route('upload_grades.second_year.index') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                            </svg>
                            <span>Back</span> 
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div>
                            <span style="font-weight: 600">Name:</span>
                            <span style="font-weight: 600">{{ $student_details->first_name .' '. $student_details->last_name }}</span>  
                        </div>

                        <div>
                            <span style="font-weight: 600">Grade School:</span>
                            @if( $student_details->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                            @endif
                        </div>

                        <div>
                            <span style="font-weight: 600">Student Curriculum:</span>
                            @if( $student_details->student_type=='1')
                                <span class="badge badge-primary mb-1">STE - Science Technology Engineer</span>
                            @else
                                <span class="badge badge-info mb-1">Regular</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div>
                            <span style="font-weight: 600">Student ID:</span>
                            <span style="font-weight: 600">{{ $student_details->student_id }}</span> 
                        </div> 

                        <div class="mt-2" style="font-weight: 600">
                                <span>Student Section:</span> 
                            @if($student_details->student_sections=='1')
                                <span class="badge badge-info mb-1">Absolute</span>
                            @elseif($student_details->student_sections=='2')
                                <span class="badge badge-info mb-1">Bright</span>
                            @elseif($student_details->student_sections=='3')
                                <span class="badge badge-info mb-1">Creative</span>
                            @elseif($student_details->student_sections=='4')
                                <span class="badge badge-info mb-1">Dynamic</span>
                            @elseif($student_details->student_sections=='5')
                                <span class="badge badge-info mb-1">Ethica</span>
                            @elseif($student_details->student_sections=='6')
                                <span class="badge badge-info mb-1">Flexible</span>
                            @elseif($student_details->student_sections=='7')
                                <span class="badge badge-info mb-1">Gracious</span>
                            @elseif($student_details->student_sections=='8')
                                <span class="badge badge-info mb-1">Honest</span>
                            @elseif($student_details->student_sections=='9')
                                <span class="badge badge-info mb-1">Immaculate</span>
                            @elseif($student_details->student_sections=='10')
                                <span class="badge badge-info mb-1">Just</span>
                            @else
                                <span class="badge badge-info mb-1">STE</span>
                            @endif
                        </div>
                       
                        <div>
                            <span style="font-weight: 600">School Year:</span>
                            <span style="font-weight: 600">{{  date('d-m-Y', strtotime($student_details->school_year_start)) }}</span> 
                            <span>/</span>
                            <span style="font-weight: 600">{{  date('d-m-Y', strtotime($student_details->school_year_end)) }}</span> 
                        </div>
                    </div>
                </div>

                <form action="{{ route('upload_grades.second_year.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input hidden type="text" value="{{ $student_details->student_id }}" name="student_id" id="student_id">
                    <input hidden type="text" value="{{ $student_details->grade_school }}" name="grade_school" id="grade_school">
                    <input hidden type="text" value="{{ $student_details->enrollment_status }}" name="enrollment_status" id="enrollment_status">
                    <input hidden type="text" value="{{ date('Y-m-d', strtotime($student_details->school_year_start)) }}" name="school_year_start" id="school_year_start">
                    <input hidden type="text" value="{{ date('Y-m-d', strtotime($student_details->school_year_end)) }}" name="school_year_end" id="school_year_end">
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label style="font-size: smaller;">Grading Period</label>
                            <select class="form-control" name="grading_period" id="grading_period">
                                <option value="option_select" disabled selected>--</option>
                                <option value="1" {{old('grading_period') =="1" ? 'selected' : ''}}>1st Quarter</option>
                                <option value="2" {{old('grading_period') =="2" ? 'selected' : ''}}>2nd Quarter</option>
                                <option value="3" {{old('grading_period') =="3" ? 'selected' : ''}}>3rd Quarter</option>
                                <option value="4" {{old('grading_period') =="4" ? 'selected' : ''}}>4th Quarter</option>
                            </select>
                            @if ($errors->has('grading_period'))
                                <span class="text-danger text-left">{{ $errors->first('grading_period') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">Mathematics Subject</label>
                            <div class="">
                                <input type="text" name="mathematics" id="mathematics" class="form-control" placeholder="Mathematics" maxlength="50">
                                @if ($errors->has('mathematics'))
                                    <span class="text-danger text-left">{{ $errors->first('mathematics') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">Science Subject</label>
                            <div class="">
                                <input type="text" name="science" id="science" class="form-control" placeholder="Science" maxlength="50">
                                @if ($errors->has('science'))
                                    <span class="text-danger text-left">{{ $errors->first('science') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">English Subject</label>
                            <div class="">
                                <input type="text" name="english" id="english" class="form-control" placeholder="English" maxlength="50">
                                @if ($errors->has('english'))
                                    <span class="text-danger text-left">{{ $errors->first('english') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">AP Subject</label>
                            <div class="">
                                <input type="text" name="ap" id="ap" class="form-control" placeholder="AP" maxlength="50">
                                @if ($errors->has('ap'))
                                    <span class="text-danger text-left">{{ $errors->first('ap') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">ESP Subject</label>
                            <div class="">
                                <input type="text" name="esp" id="esp" class="form-control" placeholder="ESP" maxlength="50">
                                @if ($errors->has('esp'))
                                    <span class="text-danger text-left">{{ $errors->first('esp') }}</span>
                                @endif
                            </div>
                        </div>

                        @if($student_details->student_type=='1')
                        <div class="form-group">
                            <label style="font-size: smaller;">Research Subject</label>
                            <div class="">
                                <input type="text" name="research" id="research" class="form-control" placeholder="Research" maxlength="50">
                                @if ($errors->has('research'))
                                    <span class="text-danger text-left">{{ $errors->first('research') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">Advance Biology Subject</label>
                            <div class="">
                                <input type="text" name="advance_biology" id="advance_biology" class="form-control" placeholder="Advance Biology" maxlength="50">
                                @if ($errors->has('advance_biology'))
                                    <span class="text-danger text-left">{{ $errors->first('advance_biology') }}</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label style="font-size: smaller;">Filipino Subject</label>
                            <div class="">
                                <input type="text" name="filipino" id="filipino" class="form-control" placeholder="Filipino" maxlength="50">
                                @if ($errors->has('filipino'))
                                    <span class="text-danger text-left">{{ $errors->first('filipino') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">TLE Subject</label>
                            <div class="">
                                <input type="text" name="tle" id="tle" class="form-control" placeholder="TLE" maxlength="50">
                                @if ($errors->has('tle'))
                                    <span class="text-danger text-left">{{ $errors->first('tle') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label style="font-size: smaller;">Music Subject</label>
                            <div class="">
                                <input type="text" name="music" id="music" class="form-control" placeholder="Music" maxlength="50">
                                @if ($errors->has('music'))
                                    <span class="text-danger text-left">{{ $errors->first('music') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">Arts Subject</label>
                            <div class="">
                                <input type="text" name="arts" id="arts" class="form-control" placeholder="Arts" maxlength="50">
                                @if ($errors->has('arts'))
                                    <span class="text-danger text-left">{{ $errors->first('arts') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">PE Subject</label>
                            <div class="">
                                <input type="text" name="pe" id="pe" class="form-control" placeholder="PE" maxlength="50">
                                @if ($errors->has('pe'))
                                    <span class="text-danger text-left">{{ $errors->first('pe') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: smaller;">Health Subject</label>
                            <div class="">
                                <input type="text" name="health" id="health" class="form-control" placeholder="Health" maxlength="50">
                                @if ($errors->has('health'))
                                    <span class="text-danger text-left">{{ $errors->first('health') }}</span>
                                @endif
                            </div>
                        </div>

                        @if($student_details->student_type=='1')
                        <div class="form-group">
                            <label style="font-size: smaller;">Statistics Subject</label>
                            <div class="">
                                <input type="text" name="statistics" id="statistics" class="form-control" placeholder="Statistics" maxlength="50">
                                @if ($errors->has('statistics'))
                                    <span class="text-danger text-left">{{ $errors->first('statistics') }}</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5" viewBox="0 0 448 512">
                            <path fill="#fafcff" d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                        </svg>
                        <span>Save</span> 
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
@endsection
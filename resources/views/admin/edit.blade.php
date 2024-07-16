@extends('layouts.app-master')

@section('content')
    @auth
    <div class="py-5 container-fluid">
        <div> 
            @include('layouts.partials.messages')
        </div>
        <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <div style="font-weight: 700; font-size: larger;">Edit Enrollment Students</div>
                    <div>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                            </svg>
                            <span>Back</span> 
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin.update', $edit_students->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
                    <div style="font-weight: 600; font-size: 15px">Student Information:</div>

                    <div>
                        <input type="text" name="student_id" id="student_id" value="{{ $edit_students->student_id }}" hidden>
                        <input type="text" name="first_name" id="first_name" value="{{ $edit_students->first_name }}" hidden>
                        <input type="text" name="last_name" id="last_name" value="{{ $edit_students->last_name }}" hidden>
                        <input type="text" name="grade_school" id="grade_school" value="{{ $edit_students->grade_school }}" hidden>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label style="font-size: smaller;">First Name</label>
                                <div class="">
                                    <input disabled type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" maxlength="50" value="{{ $edit_students->first_name}}">
                                    <!-- @if ($errors->has('first_name'))
                                        <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Middle Name</label>
                                <div class="">
                                    <input disabled type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" maxlength="50" value="{{ $edit_students->middle_name }}">
                                    <!-- @if ($errors->has('last_name'))
                                        <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Last Name</label>
                                <div class="">
                                    <input disabled type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" maxlength="50" value="{{ $edit_students->last_name }}">
                                    <!-- @if ($errors->has('last_name'))
                                        <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Name EXTN</label>
                                <div class="">
                                    <input type="text" name="name_extn" id="name_extn" class="form-control" placeholder="Name EXTN" maxlength="50" value="{{ $edit_students->name_extn }}">
                                    <!-- @if ($errors->has('last_name'))
                                        <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label style="font-size: smaller;">Birthdate</label>
                                    <div class="">
                                        <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ date('Y-m-d', strtotime($edit_students->birthdate)) }}" disabled>
                                        <!-- @if ($errors->has('school_year_start'))
                                            <span class="text-danger text-left">{{ $errors->first('school_year_start') }}</span>
                                        @endif -->
                                    </div>
                                </div>

                                <div class="col-sm-6 row">
                                    <label style="font-size: smaller;">Sex</label>
                                    <select class="form-control" name="sex" id="sex">
                                        @if($edit_students->sex == 1)
                                            <option value="sex" disabled selected>Male</option>
                                        @else
                                            <option value="sex" disabled selected>Female</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Student Curriculum</label>
                                <select class="form-control" name="student_type" id="student_type">
                                        <option value="option_select" disabled selected>--</option>
                                    @foreach($student_type as $st)
                                        <option value="{{ $st->student_type_id }}" @selected(!empty($edit_students->student_type) && $st->student_type_id==old('st') || $st->student_type_id==$edit_students->student_type)>{{ $st->student_type_label }}</option>
                                    @endforeach
                                    <!-- <option value="2" {{old('enrollment_status') =="2" ? 'selected' : ''}}>Not Enrolled</option> -->
                                </select>
                                <!-- @if ($errors->has('enrollment_status'))
                                    <span class="text-danger text-left">{{ $errors->first('enrollment_status') }}</span>
                                @endif -->
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Student Section</label>
                                <select class="form-control" name="student_sections" id="student_sections">
                                    <option value="option_select" disabled selected>--</option>
                                    @foreach($student_section as $ss)
                                        <option value="{{ $ss->student_section_id }}" @selected(!empty($edit_students->student_sections) && $ss->student_section_id==old('ss') || $ss->student_section_id==$edit_students->student_sections)> {{ $ss->student_section_label }}</option>
                                    @endforeach
                                </select>
                                <label style="color: red; font-style: italic; font-size: smaller;">Notes: Only for regular students</label>
                                <!-- @if ($errors->has('student_status'))
                                    <span class="text-danger text-left">{{ $errors->first('student_status') }}</span>
                                @endif -->
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label style="font-size: smaller;">Student ID</label>
                                <div class="">
                                    <input disabled type="text" name="student_id" id="student_id" class="form-control" placeholder="Student ID" maxlength="20" value="{{ $edit_students->student_id }}">
                                    <!-- @if ($errors->has('student_id'))
                                        <span class="text-danger text-left">{{ $errors->first('student_id') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Age</label>
                                <div class="">
                                    <input type="text" name="age" id="age" class="form-control" placeholder="Age" maxlength="10" value="{{ $edit_students->age }}">
                                    <!-- @if ($errors->has('age'))
                                        <span class="text-danger text-left">{{ $errors->first('age') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Address</label>
                                <div class="">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" maxlength="100" value="{{ $edit_students->address }}">
                                    <!-- @if ($errors->has('address'))
                                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                    @endif -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Grade School</label>
                                <select disabled class="form-control" name="grade_school" id="grade_school">
                                    @foreach($grade_schools as $gr)
                                        <option value="{{ $gr->gr_school_id }}" @selected(!empty($edit_students->grade_school) && $gr->gr_school_id==old('gr') || $gr->gr_school_id==$edit_students->grade_school)>{{ $gr->gr_school }}</option>
                                    @endforeach
                                </select>
                                <!-- @if ($errors->has('grade_school'))
                                    <span class="text-danger text-left">{{ $errors->first('grade_school') }}</span>
                                @endif -->
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Student Status</label>
                                <select class="form-control" name="student_status" id="student_status">
                                    <option value="option_select" disabled selected>--</option>
                                    @foreach($student_status as $ss)
                                        <option value="{{ $ss->student_status_id }}" @selected(!empty($edit_students->student_status) && $ss->student_status_id==old('ss') || $ss->student_status_id==$edit_students->student_status)> {{ $ss->student_status_label }}</option>
                                    @endforeach
                                </select>
                                <!-- @if ($errors->has('student_status'))
                                    <span class="text-danger text-left">{{ $errors->first('student_status') }}</span>
                                @endif -->
                            </div>

                            <div class="form-group">
                                <label style="font-size: smaller;">Enrollment Status</label>
                                <select class="form-control" name="enrollment_status" id="enrollment_status">
                                        <option value="option_select" disabled selected>--</option>
                                    @foreach($enrollment_status as $es)
                                        <option value="{{ $es->enrollment_status_id }}" @selected(!empty($edit_students->enrollment_status) && $es->enrollment_status_id==old('es') || $es->enrollment_status_id==$edit_students->enrollment_status)>{{ $es->enrollment_status_label }}</option>
                                    @endforeach
                                    <!-- <option value="2" {{old('enrollment_status') =="2" ? 'selected' : ''}}>Not Enrolled</option> -->
                                </select>
                                <!-- @if ($errors->has('enrollment_status'))
                                    <span class="text-danger text-left">{{ $errors->first('enrollment_status') }}</span>
                                @endif -->
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label style="font-size: smaller;">School Year Start</label>
                                    <div class="">
                                        <input type="date" name="school_year_start" id="school_year_start" class="form-control" value="{{ date('Y-m-d', strtotime($edit_students->school_year_start)) }}">
                                        <!-- @if ($errors->has('school_year_start'))
                                            <span class="text-danger text-left">{{ $errors->first('school_year_start') }}</span>
                                        @endif -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="font-size: smaller;">School Year End</label>
                                    <div class="">
                                        <input type="date" name="school_year_end" id="school_year_end" class="form-control" value="{{ date('Y-m-d', strtotime($edit_students->school_year_end)) }}">
                                        <!-- @if ($errors->has('school_year_end'))
                                            <span class="text-danger text-left">{{ $errors->first('school_year_end') }}</span>
                                        @endif -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5" viewBox="0 0 448 512">
                                <path fill="#fafcff" d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                            </svg>
                            <span>Update</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
@endsection
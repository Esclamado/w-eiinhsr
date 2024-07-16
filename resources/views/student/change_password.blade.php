@extends('layouts.app-master')

@section('content')
    @auth
    <div class="py-5 container-fluid" style="width: 50% !important">
        <div> 
            @include('layouts.partials.messages')
        </div>
        <div class="card" style="box-shadow: 1px 1px 2px lightblue;">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <div style="font-weight: 700; font-size: larger;">Change Password</div>
                </div>

                <form action="{{ route('student.update_password', auth()->user()->student_id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mt-2">
                        <!-- <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required="required">
                            <label class="form-label">Old Password</label>
                        </div> -->

                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                            <label class="form-label">Password</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password" required="required">
                            <label class="form-label">Confirm Password</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <div class="btn-group mr-3">
                        <a href="{{ route('student.first_year_grades.index') }}" type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                            </svg>
                            <span>Back</span> 
                        </a>
                    </div>
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
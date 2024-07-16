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
                    @if(auth()->user()->user_access !== "4")
                    <div style="font-weight: 700; font-size: larger;">Dashboard - Upload Grades for Grade 10 Students</div>
                    @endif
                    @if(auth()->user()->user_access === "4")
                    <div style="font-weight: 700; font-size: larger;">Dashboard - View Grades for Grade 10 Students</div>
                    @endif
                    
                    <div class="d-flex">
                        @if(auth()->user()->user_access === "2")
                        <div class="btn-group mr-3">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Upload Grades
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('upload_grades.first_year.index') }}">Grading 7</a>
                                <a class="dropdown-item" href="{{ route('upload_grades.second_year.index') }}">Grading 8</a>
                                <a class="dropdown-item" href="{{ route('upload_grades.third_year.index') }}">Grading 9</a>
                                <a class="dropdown-item" href="{{ route('upload_grades.fourth_year.index') }}">Grading 10</a>
                            </div>
                        </div>
                        @endif

                        @if(auth()->user()->user_access !== "2")
                        <div class="mr-3">
                            <a href="{{ route('admin.index') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                    <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z"/>
                                </svg>
                                <span>Back</span> 
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
          
                <div>
                    <form action="{{ route('upload_grades.fourth_year.index') }}" method="get">
                        <div class="d-flex">
                            <div class="mr-2" style="width: 40%">
                                <input type="search" class="form-control mb-3" placeholder="Search" name="search">
                            </div>
                            <div class="mr-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <div>
                                <button href="{{ route('upload_grades.fourth_year.index') }}" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-responsive-lg mb-0">
                        <thead>
                            <tr>
                                <th> Student ID  </th>
                                <th> Student Name  </th>
                                <th> Grade School </th>
                                <th> Student Curriculum </th>
                                <th> Status  </th>
                                <th class="text-center">  Action  </th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($enrollments as $enrollment)
                            @if($enrollment->grade_school == '4' && $enrollment->enrollment_status == '1') 
                            <tr>
                                <td>{{ $enrollment->student_id }}</td>
                                <td>{{ $enrollment->first_name .' '. $enrollment->last_name }}</td>
                                <td>
                                    @if($enrollment->grade_school=='4')
                                        <span class="badge badge-dark mb-1">Grade 10</span>
                                    @endif
                                </td>
                                <td>
                                    @if($enrollment->student_type=='1')
                                        <span class="badge badge-primary mb-1">STE</span>
                                    @else
                                        <span class="badge badge-info mb-1">Regular</span>
                                    @endif
                                </td>
                                <td>
                                    @if($enrollment->enrollment_status=='1')
                                        <span class="badge badge-success mb-1">Enrolled</span>
                                    @else
                                        <span class="badge badge-danger mb-1">Not Enrolled</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('upload_grades.fourth_year.view', $enrollment->student_id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="View Grades">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="12" width="13.5" viewBox="0 0 576 512">
                                            <path fill="#fafafa" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                        </svg>
                                    </a>
                                    @if(auth()->user()->user_access !== "4")
                                    <a href="{{ route('upload_grades.fourth_year.create', $enrollment->student_id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Upload Grades">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                            <path fill="#fcfcfc" d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                                        </svg>   
                                    </a>
                                    
                                    <a href="{{ route('upload_grades.fourth_year.edit', $enrollment->student_id) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Edit Grades">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512">
                                            <path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                        </svg>   
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                    <div class="mt-4 mb-4">                                       
                                        <svg xmlns="http://www.w3.org/2000/svg" height="84" width="120" viewBox="0 0 640 512">
                                            <path fill="#858585" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                                        </svg>
                                    </div>
                                    No Student Enrolled.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div>
                        Showing {{ $enrollments->firstItem() }} to {{$enrollments->lastItem()}} of {{$enrollments->total()}} entries
                    </div>
                    <div>
                        @if ($enrollments->hasPages())
                            <div class="d-flex flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                                <div>
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($enrollments->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">Prev</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $enrollments->previousPageUrl() }}" rel="prev"
                                                aria-label="@lang('pagination.previous')">Prev</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @php
                                            $currentPage = $enrollments->currentPage();
                                            $lastPage = $enrollments->lastPage();
                                            $pageRange = 4; // Number of pages to show before and after the current page
                                            $ellipsis = '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                                        @endphp

                                        @if ($lastPage <= 7) {{-- Show all page numbers --}}
                                            @for ($i = 1; $i <= $lastPage; $i++)
                                                <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $enrollments->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                        @else {{-- Show ellipsis and range of pages around the current page --}}
                                            @if ($currentPage <= 4) {{-- First few pages --}}
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $enrollments->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            {!! $ellipsis !!}
                                                <li class="page-item"><a class="page-link" href="{{ $enrollments->url($lastPage) }}">{{ $lastPage }}</a></li>
                                        @elseif ($currentPage >= $lastPage - 3) {{-- Last few pages --}}
                                                <li class="page-item"><a class="page-link" href="{{ $enrollments->url(1) }}">1</a></li>
                                            {!! $ellipsis !!}
                                            @for ($i = $lastPage - 4; $i <= $lastPage; $i++)
                                                <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $enrollments->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                        @else {{-- Middle pages --}}
                                                <li class="page-item"><a class="page-link" href="{{ $enrollments->url(1) }}">1</a></li>
                                            {!! $ellipsis !!}
                                            @for ($i = $currentPage - 1; $i <= $currentPage + 1; $i++)
                                                <li class="page-item {{ ($i == $currentPage) ? 'active' : '' }}"><a class="page-link" href="{{ $enrollments->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                                {!! $ellipsis !!}
                                                <li class="page-item"><a class="page-link" href="{{ $enrollments->url($lastPage) }}">{{ $lastPage }}</a></li>
                                            @endif
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($enrollments->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $enrollments->nextPageUrl() }}" rel="next"
                                                aria-label="@lang('pagination.next')">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">Next</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
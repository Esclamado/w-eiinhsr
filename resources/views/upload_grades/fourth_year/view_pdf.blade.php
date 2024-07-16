
@if($view_student_details && $view_student_details_second && $view_student_details_third && $view_student_details_fourth)

<!-- SCIENCE TECHNOLOGY ENGINEER (STE) -->
@if($view_student_details->student_type == '1' || $view_student_details_second->student_type == '1' || $view_student_details_third->student_type == '1' || $view_student_details_fourth->student_type == '1')
<div class="py-5 container-fluid">
    <div class="card">
        <div class="card-header" style="font-size: 12px !important">
            <div style="text-align: center">
               
                <label>Republic of the Philippines</label><br>
                <label>Department of Education</label><br>
                <label style="font-weight: 900">Learner Permanent Record for Junior High School (SF10-JHS)</label><br>
                <label style="font-style: italic">(Formely Form 137)</label><br>
                <label style="font-weight: 900">LEARNER'S INFORMATION</label>
            </div>

            <div style="margin-top: 15px">
                <label>Last Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->last_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>First Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->first_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Name EXTN: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->name_extn ?? 'N/A'}}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Middle Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->middle_name ?? 'N/A' }}</span>
                </label>
            </div>

            <div style="margin-top: 15px">
                <label>Learner Reference ID (LRN): &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->student_id }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Birthdate: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; "> {{ date("m/d/Y", strtotime($view_student_details->birthdate)) }} </span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Sex: &nbsp;
                    @if($view_student_details->sex == '1')
                        <span style="text-decoration: underline; font-weight: 600;"> Male </span>
                    @else
                        <span style="text-decoration: underline; font-weight: 600;"> Female </span>
                    @endif
                </label>
            </div>
    
            <div style="font-weight: 600; text-align: center">
                <p>ELIGIBILITY FOR JHS ENROLLMENT</p>
            </div>

            <hr style="margin-top: 15px">

            <div>
                <span>___ Elementary School Completer </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>General Average ___ </span> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Citation: (if any) ____________________ </span>
            </div>

            <div>
                <span>Name of Elementary School: ___________________________</span>
                &nbsp;&nbsp;
                <span>School ID: __________</span>
                &nbsp;&nbsp;
                <span>Address of School: ___________________________</span>
            </div>

            <hr>

            <div>
                <span>Other Credential Presented</span><br>
                <span>____ PEPT Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ ALS A & E Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ Others (Pls Specify): ____________________</span>
            </div>

            <div>
                <span>Date of Examination / Assestment (mm/dd/yyyy): _________</span>
                &nbsp;&nbsp;
                <span>Name and Address of Testing Center: __________________________________</span>
            </div>

            <div style="font-weight: 600; text-align: center">
                <p>SCHOLASTIC RECORD</p>
            </div>
            <hr>
            <!-- Grade 7 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
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
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details->school_year_start)) }}-{{  date('Y', strtotime($view_student_details->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>

            <hr>  

            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->fy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->fy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 8 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_second)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_second->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_second->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_second->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_second->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_second->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_second->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_second->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_second->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_second->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_second->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_second->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_second->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_second->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_second->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_second->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_second->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                            <th style="padding: 5px; text-align: center">Research</th>
                            <th style="padding: 5px; text-align: center">Advance Biology</th>
                            <th style="padding: 5px; text-align: center">Statistics</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_second as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->sy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->sy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->research }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->advance_biology }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->statistics }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 9 --><br>
            <div  style="margin-top: 240px">
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_third)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_third->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_third->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_third->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_third->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_third->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_third->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_third->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_third->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_third->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_third->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_third->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_third->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_third->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_third->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_third->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_third->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                            <th style="padding: 5px; text-align: center">Research</th>
                            <th style="padding: 5px; text-align: center">Ehanced Algebra</th>
                            <th style="padding: 5px; text-align: center">Advance Chemistry</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_third as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->ty_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->ty_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->research }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->enhanced_algebra }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->advance_chemistry }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 10 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_fourth)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_fourth->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_fourth->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_fourth->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_fourth->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_fourth->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_fourth->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_fourth->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_fourth->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_fourth->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_fourth->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_fourth->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_fourth->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_fourth->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_fourth->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_fourth->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_fourth->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_______</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                            <th style="padding: 5px; text-align: center">Research</th>
                            <th style="padding: 5px; text-align: center">Advance Physics</th>
                            <th style="padding: 5px; text-align: center">Calculus</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_fourth as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->foy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->foy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->research }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->advance_physics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->calculus }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
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
@endif
<!--END SCIENCE TECHNOLOGY ENGINEER (STE) -->

<!-- REGULAR -->
@if($view_student_details->student_type == '2' || $view_student_details_second->student_type == '2' || $view_student_details_third->student_type == '2' || $view_student_details_fourth->student_type == '2')
<div class="py-5 container-fluid">
    <div class="card">
        <div class="card-header" style="font-size: 12px !important">
            <div style="text-align: center">
               
                <label>Republic of the Philippines</label><br>
                <label>Department of Education</label><br>
                <label style="font-weight: 900">Learner Permanent Record for Junior High School (SF10-JHS)</label><br>
                <label style="font-style: italic">(Formely Form 137)</label><br>
                <label style="font-weight: 900">LEARNER'S INFORMATION</label>
            </div>

            <div style="margin-top: 15px">
                <label>Last Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->last_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>First Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->first_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Name EXTN: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->name_extn ?? 'N/A'}}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Middle Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->middle_name ?? 'N/A' }}</span>
                </label>
            </div>

            <div style="margin-top: 15px">
                <label>Learner Reference ID (LRN): &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->student_id }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Birthdate: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; "> {{ date("m/d/Y", strtotime($view_student_details->birthdate)) }} </span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Sex: &nbsp;
                    @if($view_student_details->sex == '1')
                        <span style="text-decoration: underline; font-weight: 600;"> Male </span>
                    @else
                        <span style="text-decoration: underline; font-weight: 600;"> Female </span>
                    @endif
                </label>
            </div>
    
            <div style="font-weight: 600; text-align: center">
                <p>ELIGIBILITY FOR JHS ENROLLMENT</p>
            </div>

            <hr style="margin-top: 15px">

            <div>
                <span>___ Elementary School Completer </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>General Average ___ </span> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Citation: (if any) ____________________ </span>
            </div>

            <div>
                <span>Name of Elementary School: ___________________________</span>
                &nbsp;&nbsp;
                <span>School ID: __________</span>
                &nbsp;&nbsp;
                <span>Address of School: ___________________________</span>
            </div>

            <hr>

            <div>
                <span>Other Credential Presented</span><br>
                <span>____ PEPT Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ ALS A & E Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ Others (Pls Specify): ____________________</span>
            </div>

            <div>
                <span>Date of Examination / Assestment (mm/dd/yyyy): _________</span>
                &nbsp;&nbsp;
                <span>Name and Address of Testing Center: __________________________________</span>
            </div>

            <div style="font-weight: 600; text-align: center">
                <p>SCHOLASTIC RECORD</p>
            </div>
            <hr>
            <!-- Grade 7 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
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
                        <span class="badge badge-info mb-1">N/A</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details->school_year_start)) }}-{{  date('Y', strtotime($view_student_details->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>

            <hr>  

            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->fy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->fy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 8 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_second)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_second->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_second->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_second->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_second->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_second->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_second->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_second->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_second->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_second->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_second->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_second->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_second->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_second->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_second->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">N/A</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_second->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_second->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_second as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->sy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->sy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 9 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_third)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_third->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_third->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_third->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_third->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_third->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_third->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_third->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_third->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_third->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_third->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_third->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_third->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_third->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_third->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">N/A</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_third->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_third->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                            <!-- <th style="padding: 5px; text-align: center">Final Rating</th> -->
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_third as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->ty_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->ty_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 10 -->
            <div style="margin-top: 40px">
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_fourth)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_fourth->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_fourth->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_fourth->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_fourth->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_fourth->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_fourth->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_fourth->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_fourth->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_fourth->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_fourth->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_fourth->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_fourth->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_fourth->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_fourth->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">N/A</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_fourth->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_fourth->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_______</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_fourth as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->foy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->foy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
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
@endif
<!-- END REGULAR -->

@else
<!-- BLANK -->
<div class="py-5 container-fluid">
    <div class="card">
        <div class="card-header" style="font-size: 12px !important">
            <div style="text-align: center">
               
                <label>Republic of the Philippines</label><br>
                <label>Department of Education</label><br>
                <label style="font-weight: 900">Learner Permanent Record for Junior High School (SF10-JHS)</label><br>
                <label style="font-style: italic">(Formely Form 137)</label><br>
                <label style="font-weight: 900">LEARNER'S INFORMATION</label>
            </div>

            <div style="margin-top: 15px">
                <label>Last Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->last_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>First Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->first_name }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Name EXTN: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->name_extn ?? 'N/A'}}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Middle Name: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->middle_name ?? 'N/A' }}</span>
                </label>
            </div>

            <div style="margin-top: 15px">
                <label>Learner Reference ID (LRN): &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; ">{{ $view_student_details->student_id }}</span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Birthdate: &nbsp;
                    <span style="text-decoration: underline; font-weight: 600; "> {{ date("m/d/Y", strtotime($view_student_details->birthdate)) }} </span>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Sex: &nbsp;
                    @if($view_student_details->sex == '1')
                        <span style="text-decoration: underline; font-weight: 600;"> Male </span>
                    @else
                        <span style="text-decoration: underline; font-weight: 600;"> Female </span>
                    @endif
                </label>
            </div>
    
            <div style="font-weight: 600; text-align: center">
                <p>ELIGIBILITY FOR JHS ENROLLMENT</p>
            </div>

            <hr style="margin-top: 15px">

            <div>
                <span>___ Elementary School Completer </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>General Average ___ </span> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Citation: (if any) ____________________ </span>
            </div>

            <div>
                <span>Name of Elementary School: ___________________________</span>
                &nbsp;&nbsp;
                <span>School ID: __________</span>
                &nbsp;&nbsp;
                <span>Address of School: ___________________________</span>
            </div>

            <hr>

            <div>
                <span>Other Credential Presented</span><br>
                <span>____ PEPT Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ ALS A & E Passer</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Rating: ____</span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>____ Others (Pls Specify): ____________________</span>
            </div>

            <div>
                <span>Date of Examination / Assestment (mm/dd/yyyy): _________</span>
                &nbsp;&nbsp;
                <span>Name and Address of Testing Center: __________________________________</span>
            </div>

            <div style="font-weight: 600; text-align: center">
                <p>SCHOLASTIC RECORD</p>
            </div>
            <hr>
            <!-- Grade 7 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
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
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details->school_year_start)) }}-{{  date('Y', strtotime($view_student_details->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>

            <hr>  

            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->fy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->fy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->fy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 8 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_second)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_second->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_second->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_second->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_second->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_second->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_second->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_second->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_second->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_second->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_second->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_second->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_second->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_second->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_second->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_second->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_second->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_second as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->sy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->sy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->sy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 9 -->
            <div>
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_third)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_third->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_third->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_third->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_third->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_third->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_third->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_third->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_third->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_third->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_third->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_third->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_third->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_third->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_third->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_third->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_third->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_________</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                            <!-- <th style="padding: 5px; text-align: center">Final Rating</th> -->
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_third as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->ty_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->ty_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->ty_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
                                No Uploaded Grades.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <hr>
            <!-- Grade 10 -->
            <div style="margin-top: 40px">
                <label>School:<span style="text-decoration: underline; font-weight: 600;">Lumampong NHS-East Extension</span></label>
                <label style="margin-left: 25px">School ID: <span style="text-decoration: underline; font-weight: 600;">301201</span></label>
                <label style="margin-left: 25px">District: <span style="text-decoration: underline; font-weight: 600;">Indang</span></label>
                <label style="margin-left: 25px">Division: <span style="text-decoration: underline; font-weight: 600;">Cavite</span></label>
                <label style="margin-left: 25px">Region: <span style="text-decoration: underline; font-weight: 600;">IV-A</span></label>
            </div>

            @if($view_student_details_fourth)
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        @if($view_student_details_fourth->grade_school=='1')
                            <span class="badge badge-dark mb-1">Grade 7</span>
                        @elseif($view_student_details_fourth->grade_school=='2')
                            <span class="badge badge-dark mb-1">Grade 8</span>
                        @elseif($view_student_details_fourth->grade_school=='3')
                            <span class="badge badge-dark mb-1">Grade 9</span>
                        @elseif($view_student_details_fourth->grade_school=='4')
                            <span class="badge badge-dark mb-1">Grade 10</span>
                        @else
                            <span class="badge badge-dark mb-1">N/A</span>
                        @endif
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                    @if($view_student_details_fourth->student_sections=='1')
                        <span class="badge badge-info mb-1">Absolute</span>
                    @elseif($view_student_details_fourth->student_sections=='2')
                        <span class="badge badge-info mb-1">Bright</span>
                    @elseif($view_student_details_fourth->student_sections=='3')
                        <span class="badge badge-info mb-1">Creative</span>
                    @elseif($view_student_details_fourth->student_sections=='4')
                        <span class="badge badge-info mb-1">Dynamic</span>
                    @elseif($view_student_details_fourth->student_sections=='5')
                        <span class="badge badge-info mb-1">Ethica</span>
                    @elseif($view_student_details_fourth->student_sections=='6')
                        <span class="badge badge-info mb-1">Flexible</span>
                    @elseif($view_student_details_fourth->student_sections=='7')
                        <span class="badge badge-info mb-1">Gracious</span>
                    @elseif($view_student_details_fourth->student_sections=='8')
                        <span class="badge badge-info mb-1">Honest</span>
                    @elseif($view_student_details_fourth->student_sections=='9')
                        <span class="badge badge-info mb-1">Immaculate</span>
                    @elseif($view_student_details_fourth->student_sections=='10')
                        <span class="badge badge-info mb-1">Just</span>
                    @else
                        <span class="badge badge-info mb-1">STE</span>
                    @endif
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        {{  date('Y', strtotime($view_student_details_fourth->school_year_start)) }}-{{  date('Y', strtotime($view_student_details_fourth->school_year_end)) }}
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________</label>
                 <label>Signature:_______</label>
            </div>
            @else
            <div style="margin-top: 10px">
                <label>Classified as Grade:
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>Section: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                </label>

                <label>School Year: 
                    <span style="text-decoration: underline; font-weight: 600;">
                        <span class="badge badge-dark mb-1">N/A</span>
                    </span>
                 </label>
                 <label>Name of Adviser/Teacher:___________________</label>
                 <label>Signature:_______________</label>
            </div>        
            @endif    
              
            <hr>  
            
            <div>
                <table style="width: 100%">
                    <thead style="border-color: #000; background-color: #e9e9e9; font-weight: 700 !important">
                        <tr>
                            <th style="padding: 5px; text-align: center">Quarterly Rating</th>
                            <th style="padding: 5px; text-align: center">Mathematics</th>
                            <th style="padding: 5px; text-align: center">Science</th>
                            <th style="padding: 5px; text-align: center">English</th>
                            <th style="padding: 5px; text-align: center">AP	</th>
                            <th style="padding: 5px; text-align: center">ESP</th>
                            <th style="padding: 5px; text-align: center">Filipino</th>
                            <th style="padding: 5px; text-align: center">TLE</th>
                            <th style="padding: 5px; text-align: center">Music</th>
                            <th style="padding: 5px; text-align: center">Arts</th>
                            <th style="padding: 5px; text-align: center">PE</th>
                            <th style="padding: 5px; text-align: center">Health</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($view_grade_students_fourth as $view_grade_student)
                        <tr>
                            <td style="padding: 8px !important; text-align: center; background-color: #e9e9e9; font-weight: 700 !important;">
                                @if($view_grade_student->foy_grading_period=='1')
                                    <span>1st Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='2')
                                    <span>2nd Quarter</span>
                                @elseif($view_grade_student->foy_grading_period=='3')
                                    <span>3rd Quarter</span>
                                @else($view_grade_student->foy_grading_period=='4')
                                    <span>4th Quarter</span>
                                @endif
                            </td>
                            
                            <td style="text-align: center"> {{ $view_grade_student->mathematics }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->science }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->english }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->ap }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->esp }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->filipino }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->tle }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->music }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->arts }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->pe }}</td>
                            <td style="text-align: center"> {{ $view_grade_student->health }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="15" style="font-weight: 800; padding: 55px; text-align: center;">
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
<!-- END BLANK -->
@endif


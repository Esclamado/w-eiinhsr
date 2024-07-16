<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Thirdyearuploadgrade;
use App\Models\Gradingperiod;

class UploadGradesThirdYearController extends Controller
{
    public function index(Request $request) {
        $enrollments = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'enrollmentlabels.enrollment_status_id  as enrollment_status_id', 'enrollmentlabels.enrollment_status_label as enrollment_status_label',
                 'enrollmentlabels.created_at AS el_created_at', 'enrollmentlabels.updated_at as el_updated_at', 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('enrollmentlabels', 'enrollmentlabels.enrollment_status_id', '=', 'enrollments.enrollment_status')
        ->where('gradeschools.gr_school_id', '=', 3)
        ->where('enrollmentlabels.enrollment_status_id', '=', 1)
    
        ->when(
            $request->search,
            function (Builder $builder) use ($request) {
                $builder->where('student_id', 'like', "%{$request->search}%")
                ->orWhere('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->orwhere(DB::raw("CONCAT(`enrollments`.`first_name`, ' ', `enrollments`.`last_name`)"), 'like', "%".$request->input('search')."%");
            }
        )        
        ->paginate(10);
      
        return view('upload_grades.third_year.index', compact('enrollments'));
    }

    public function view($id) {
        $view_grade_students = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'thirdyearuploadgrades.student_id as ty_student_id', 'thirdyearuploadgrades.grading_period as ty_grading_period',
                 'thirdyearuploadgrades.school_year_start as ty_school_year_start', 'thirdyearuploadgrades.school_year_end as ty_school_year_end',
                 'thirdyearuploadgrades.mathematics as mathematics', 'thirdyearuploadgrades.science as science', 'thirdyearuploadgrades.english as english', 
                 'thirdyearuploadgrades.ap as ap', 'thirdyearuploadgrades.esp as esp', 'thirdyearuploadgrades.filipino as filipino', 'thirdyearuploadgrades.tle as tle',
                 'thirdyearuploadgrades.music as music', 'thirdyearuploadgrades.arts as arts', 'thirdyearuploadgrades.pe as pe', 'thirdyearuploadgrades.health as health',
                 'thirdyearuploadgrades.research as research', 'thirdyearuploadgrades.enhanced_algebra as enhanced_algebra', 'thirdyearuploadgrades.advance_chemistry as advance_chemistry', 
                 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('thirdyearuploadgrades', 'thirdyearuploadgrades.student_id', '=', 'enrollments.student_id')
        ->where('thirdyearuploadgrades.student_id', '=', $id)
        ->where('enrollments.grade_school', '=', 3)
        ->get();

       $view_student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 3)->first();
  
        return view('upload_grades.third_year.view', compact('view_grade_students', 'view_student_details'));
    }

    public function create($id) {
        $student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 3)->first();

        return view('upload_grades.third_year.create', compact('student_details'));
    }

    public function store(Request $request) {
        $id = $request->student_id;

        $student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $request->student_id)->first();
        $fname = $student_details->first_name;
        $lname = $student_details->last_name;

        $check_upload_grades = DB::select("SELECT * FROM thirdyearuploadgrades 
                WHERE student_id='".$request->input('student_id')."' AND grading_period='".$request->input('grading_period')."'");
    
        if ($check_upload_grades) {
            if ($student_details->student_type == '1') {
                $this->validate($request, [
                    'student_id'          => 'required',
                    'grade_school'        => 'required',    
                    'grading_period'      => 'required|unique:thirdyearuploadgrades,grading_period',    
                    'enrollment_status'   => 'required',    
                    'school_year_start'   => 'required',    
                    'school_year_end'     => 'required',
                    'mathematics'         => 'required|numeric',
                    'science'             => 'required|numeric',
                    'english'             => 'required|numeric',        
                    'ap'                  => 'required|numeric',  
                    'esp'                 => 'required|numeric',
                    'filipino'            => 'required|numeric',
                    'tle'                 => 'required|numeric',
                    'music'               => 'required|numeric',
                    'arts'                => 'required|numeric',
                    'pe'                  => 'required|numeric',
                    'health'              => 'required|numeric',
                    'research'            => 'required|numeric',
                    'enhanced_algebra'    => 'required|numeric',
                    'advance_chemistry'   => 'required|numeric',
                ]);
            } else {
                $this->validate($request, [
                    'student_id'          => 'required',
                    'grade_school'        => 'required',    
                    'grading_period'      => 'required|unique:thirdyearuploadgrades,grading_period',    
                    'enrollment_status'   => 'required',    
                    'school_year_start'   => 'required',    
                    'school_year_end'     => 'required',
                    'mathematics'         => 'required|numeric',
                    'science'             => 'required|numeric',
                    'english'             => 'required|numeric',        
                    'ap'                  => 'required|numeric',  
                    'esp'                 => 'required|numeric',
                    'filipino'            => 'required|numeric',
                    'tle'                 => 'required|numeric',
                    'music'               => 'required|numeric',
                    'arts'                => 'required|numeric',
                    'pe'                  => 'required|numeric',
                    'health'              => 'required|numeric'
                ]);
            }
            
            $upload_grades = Thirdyearuploadgrade::create([
                'student_id'          =>  $request->input('student_id'),
                'grade_school'        =>  $request->input('grade_school'),
                'grading_period'      =>  $request->input('grading_period'),
                'enrollment_status'   =>  $request->input('enrollment_status'),
                'school_year_start'   =>  $request->input('school_year_start'),
                'school_year_end'     =>  $request->input('school_year_end'),
                'mathematics'         =>  $request->input('mathematics'),
                'science'             =>  $request->input('science'),
                'english'             =>  $request->input('english'),
                'ap'                  =>  $request->input('ap'),
                'esp'                 =>  $request->input('esp'),
                'filipino'            =>  $request->input('filipino'),
                'tle'                 =>  $request->input('tle'),
                'music'               =>  $request->input('music'),
                'arts'                =>  $request->input('arts'),
                'pe'                  =>  $request->input('pe'),
                'health'              =>  $request->input('health'),
                'research'            =>  $request->input('research'),
                'enhanced_algebra'    =>  $request->input('enhanced_algebra'),
                'advance_chemistry'   =>  $request->input('advance_chemistry'),
            ]);
    
            if ($upload_grades) {
                return redirect()->route('upload_grades.third_year.create', $id)->with('success', $fname .' '. $lname .' '. "succesfully uploaded your grades.");
            } else {
                return redirect()->route('upload_grades.third_year.create', $id)->with('error', $fname .' '. $lname .' '. "error uploading your grades.");
            }
        } else {
            if ($student_details->student_type == '1') {
                $this->validate($request, [
                    'student_id'          => 'required',
                    'grade_school'        => 'required',    
                    'grading_period'      => 'required',    
                    'enrollment_status'   => 'required',    
                    'school_year_start'   => 'required',    
                    'school_year_end'     => 'required',
                    'mathematics'         => 'required|numeric',
                    'science'             => 'required|numeric',
                    'english'             => 'required|numeric',        
                    'ap'                  => 'required|numeric',  
                    'esp'                 => 'required|numeric',
                    'filipino'            => 'required|numeric',
                    'tle'                 => 'required|numeric',
                    'music'               => 'required|numeric',
                    'arts'                => 'required|numeric',
                    'pe'                  => 'required|numeric',
                    'health'              => 'required|numeric',
                    'research'            => 'required|numeric',
                    'enhanced_algebra'    => 'required|numeric',
                    'advance_chemistry'   => 'required|numeric',
                ]);
            } else {
                $this->validate($request, [
                    'student_id'          => 'required',
                    'grade_school'        => 'required',    
                    'grading_period'      => 'required',    
                    'enrollment_status'   => 'required',    
                    'school_year_start'   => 'required',    
                    'school_year_end'     => 'required',
                    'mathematics'         => 'required|numeric',
                    'science'             => 'required|numeric',
                    'english'             => 'required|numeric',        
                    'ap'                  => 'required|numeric',  
                    'esp'                 => 'required|numeric',
                    'filipino'            => 'required|numeric',
                    'tle'                 => 'required|numeric',
                    'music'               => 'required|numeric',
                    'arts'                => 'required|numeric',
                    'pe'                  => 'required|numeric',
                    'health'              => 'required|numeric',
                ]);
            }

            $upload_grades = Thirdyearuploadgrade::create([
                'student_id'          =>  $request->input('student_id'),
                'grade_school'        =>  $request->input('grade_school'),
                'grading_period'      =>  $request->input('grading_period'),
                'enrollment_status'   =>  $request->input('enrollment_status'),
                'school_year_start'   =>  $request->input('school_year_start'),
                'school_year_end'     =>  $request->input('school_year_end'),
                'mathematics'         =>  $request->input('mathematics'),
                'science'             =>  $request->input('science'),
                'english'             =>  $request->input('english'),
                'ap'                  =>  $request->input('ap'),
                'esp'                 =>  $request->input('esp'),
                'filipino'            =>  $request->input('filipino'),
                'tle'                 =>  $request->input('tle'),
                'music'               =>  $request->input('music'),
                'arts'                =>  $request->input('arts'),
                'pe'                  =>  $request->input('pe'),
                'health'              =>  $request->input('health'),
                'research'            =>  $request->input('research'),
                'enhanced_algebra'    =>  $request->input('enhanced_algebra'),
                'advance_chemistry'   =>  $request->input('advance_chemistry'),
            ]);
    
            if ($upload_grades) {
                return redirect()->route('upload_grades.third_year.create', $id)->with('success', $fname .' '. $lname .' '. "succesfully uploaded your grades.");
            } else {
                return redirect()->route('upload_grades.third_year.create', $id)->with('error', $fname .' '. $lname .' '. "error uploading your grades.");
            }
        }

    }

    public function edit($id) {
        $student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 3)->first();
        $grading_period = Gradingperiod::query()->get();
        $edit_student_first_grading_grades = Thirdyearuploadgrade::query()
            ->where('thirdyearuploadgrades.student_id', '=', $id)
            ->where('thirdyearuploadgrades.grading_period', '=', 1)
            ->first();
        
        $edit_student_second_grading_grades = Thirdyearuploadgrade::query()
            ->where('thirdyearuploadgrades.student_id', '=', $id)
            ->where('thirdyearuploadgrades.grading_period', '=', 2)
            ->first();

        $edit_student_third_grading_grades = Thirdyearuploadgrade::query()
            ->where('thirdyearuploadgrades.student_id', '=', $id)
            ->where('thirdyearuploadgrades.grading_period', '=', 3)
            ->first();

        $edit_student_fourth_grading_grades = Thirdyearuploadgrade::query()
            ->where('thirdyearuploadgrades.student_id', '=', $id)
            ->where('thirdyearuploadgrades.grading_period', '=', 4)
            ->first();

        $check_upload_grades = Thirdyearuploadgrade::query()
            ->where('thirdyearuploadgrades.student_id', '=', $id)
            ->where('thirdyearuploadgrades.grade_school', '=', 3)
            ->first();

        return view('upload_grades.third_year.edit', compact('student_details', 'edit_student_first_grading_grades', 'edit_student_second_grading_grades', 
                    'edit_student_third_grading_grades', 'edit_student_fourth_grading_grades', 'check_upload_grades', 'grading_period'));
    }

    public function update(Request $request, $id) {
        $student_id = $request->student_id;
        $student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $request->student_id)->first();

        if ($student_details->student_type == '1') {
            $this->validate($request, [
                'mathematics'         => 'required|numeric',
                'science'             => 'required|numeric',
                'english'             => 'required|numeric',        
                'ap'                  => 'required|numeric',  
                'esp'                 => 'required|numeric',
                'filipino'            => 'required|numeric',
                'tle'                 => 'required|numeric',
                'music'               => 'required|numeric',
                'arts'                => 'required|numeric',
                'pe'                  => 'required|numeric',
                'health'              => 'required|numeric',
                'research'            => 'required|numeric',
                'enhanced_algebra'    => 'required|numeric',
                'advance_chemistry'   => 'required|numeric',
            ]);
        } else {
            $this->validate($request, [
                'mathematics'         => 'required|numeric',
                'science'             => 'required|numeric',
                'english'             => 'required|numeric',        
                'ap'                  => 'required|numeric',  
                'esp'                 => 'required|numeric',
                'filipino'            => 'required|numeric',
                'tle'                 => 'required|numeric',
                'music'               => 'required|numeric',
                'arts'                => 'required|numeric',
                'pe'                  => 'required|numeric',
                'health'              => 'required|numeric',
            ]);
        }
        
        $check_grading_period = $request->grading_period;

        if ($check_grading_period == '1') {
            $update_first_grading = Thirdyearuploadgrade::findorfail($id);
      
            $update_first_grading->student_id             = $request->input('student_id');  
            $update_first_grading->grade_school           = $request->input('grade_school');    
            $update_first_grading->grading_period         = $request->input('grading_period'); 
            $update_first_grading->enrollment_status      = $request->input('enrollment_status');   
            $update_first_grading->school_year_start      = $request->input('school_year_start');   
            $update_first_grading->school_year_end        = $request->input('school_year_end');   
            $update_first_grading->mathematics            = $request->input('mathematics'); 
            $update_first_grading->science                = $request->input('science'); 
            $update_first_grading->english                = $request->input('english');   
            $update_first_grading->ap                     = $request->input('ap'); 
            $update_first_grading->esp                    = $request->input('esp');
            $update_first_grading->filipino               = $request->input('filipino');
            $update_first_grading->tle                    = $request->input('tle');
            $update_first_grading->music                  = $request->input('music');
            $update_first_grading->arts                   = $request->input('arts');
            $update_first_grading->pe                     = $request->input('pe');
            $update_first_grading->health                 = $request->input('health');
            $update_first_grading->research               = $request->input('research');
            $update_first_grading->enhanced_algebra       = $request->input('enhanced_algebra');
            $update_first_grading->advance_chemistry      = $request->input('advance_chemistry');
            $res = $update_first_grading->update();
    
            if ($res) {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('success',  "1st Grading succesfully updated.");
            } else {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('error',  "Error updating on grades.");
            }
        } elseif ($check_grading_period == '2') {
            $update_second_grading = Thirdyearuploadgrade::findorfail($id);
      
            $update_second_grading->student_id             = $request->input('student_id');  
            $update_second_grading->grade_school           = $request->input('grade_school');    
            $update_second_grading->grading_period         = $request->input('grading_period'); 
            $update_second_grading->enrollment_status      = $request->input('enrollment_status');   
            $update_second_grading->school_year_start      = $request->input('school_year_start');   
            $update_second_grading->school_year_end        = $request->input('school_year_end');   
            $update_second_grading->mathematics            = $request->input('mathematics'); 
            $update_second_grading->science                = $request->input('science'); 
            $update_second_grading->english                = $request->input('english');   
            $update_second_grading->ap                     = $request->input('ap'); 
            $update_second_grading->esp                    = $request->input('esp');
            $update_second_grading->filipino               = $request->input('filipino');
            $update_second_grading->tle                    = $request->input('tle');
            $update_second_grading->music                  = $request->input('music');
            $update_second_grading->arts                   = $request->input('arts');
            $update_second_grading->pe                     = $request->input('pe');
            $update_second_grading->health                 = $request->input('health');
            $update_second_grading->research               = $request->input('research');
            $update_second_grading->enhanced_algebra       = $request->input('enhanced_algebra');
            $update_second_grading->advance_chemistry      = $request->input('advance_chemistry');
            $res = $update_second_grading->update();
    
            if ($res) {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('success',  "2nd Grading succesfully updated.");
            } else {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('error',  "Error updating on grades.");
            }
        } elseif ($check_grading_period == '3') {
            $update_third_grading = Thirdyearuploadgrade::findorfail($id);
      
            $update_third_grading->student_id             = $request->input('student_id');  
            $update_third_grading->grade_school           = $request->input('grade_school');    
            $update_third_grading->grading_period         = $request->input('grading_period'); 
            $update_third_grading->enrollment_status      = $request->input('enrollment_status');   
            $update_third_grading->school_year_start      = $request->input('school_year_start');   
            $update_third_grading->school_year_end        = $request->input('school_year_end');   
            $update_third_grading->mathematics            = $request->input('mathematics'); 
            $update_third_grading->science                = $request->input('science'); 
            $update_third_grading->english                = $request->input('english');   
            $update_third_grading->ap                     = $request->input('ap'); 
            $update_third_grading->esp                    = $request->input('esp');
            $update_third_grading->filipino               = $request->input('filipino');
            $update_third_grading->tle                    = $request->input('tle');
            $update_third_grading->music                  = $request->input('music');
            $update_third_grading->arts                   = $request->input('arts');
            $update_third_grading->pe                     = $request->input('pe');
            $update_third_grading->health                 = $request->input('health');
            $update_third_grading->research               = $request->input('research');
            $update_third_grading->enhanced_algebra       = $request->input('enhanced_algebra');
            $update_third_grading->advance_chemistry      = $request->input('advance_chemistry');
            $res = $update_third_grading->update();
    
            if ($res) {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('success',  "3rd Grading succesfully updated.");
            } else {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('error',  "Error updating on grades.");
            }
        } else if ($check_grading_period == '4') {
            $update_fourth_grading = Thirdyearuploadgrade::findorfail($id);
      
            $update_fourth_grading->student_id             = $request->input('student_id');  
            $update_fourth_grading->grade_school           = $request->input('grade_school');    
            $update_fourth_grading->grading_period         = $request->input('grading_period'); 
            $update_fourth_grading->enrollment_status      = $request->input('enrollment_status');   
            $update_fourth_grading->school_year_start      = $request->input('school_year_start');   
            $update_fourth_grading->school_year_end        = $request->input('school_year_end');   
            $update_fourth_grading->mathematics            = $request->input('mathematics'); 
            $update_fourth_grading->science                = $request->input('science'); 
            $update_fourth_grading->english                = $request->input('english');   
            $update_fourth_grading->ap                     = $request->input('ap'); 
            $update_fourth_grading->esp                    = $request->input('esp');
            $update_fourth_grading->filipino               = $request->input('filipino');
            $update_fourth_grading->tle                    = $request->input('tle');
            $update_fourth_grading->music                  = $request->input('music');
            $update_fourth_grading->arts                   = $request->input('arts');
            $update_fourth_grading->pe                     = $request->input('pe');
            $update_fourth_grading->health                 = $request->input('health');
            $update_fourth_grading->research               = $request->input('research');
            $update_fourth_grading->enhanced_algebra       = $request->input('enhanced_algebra');
            $update_fourth_grading->advance_chemistry      = $request->input('advance_chemistry');
            $res = $update_fourth_grading->update();
    
            if ($res) {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('success',  "4th Grading succesfully updated.");
            } else {
                return redirect()->route('upload_grades.third_year.edit', $student_id)->with('error',  "Error updating on grades.");
            }
        }
    }

    public function createPDF($id) {
        $view_grade_students = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'firstyearuploadgrades.student_id as fy_student_id', 'firstyearuploadgrades.grading_period as fy_grading_period',
                 'firstyearuploadgrades.school_year_start as fy_school_year_start', 'firstyearuploadgrades.school_year_end as fy_school_year_end',
                 'firstyearuploadgrades.mathematics as mathematics', 'firstyearuploadgrades.science as science',
                 'firstyearuploadgrades.english as english', 'firstyearuploadgrades.ap as ap', 'firstyearuploadgrades.esp as esp', 
                 'firstyearuploadgrades.filipino as filipino', 'firstyearuploadgrades.tle as tle', 'firstyearuploadgrades.music as music',
                 'firstyearuploadgrades.arts as arts', 'firstyearuploadgrades.pe as pe', 'firstyearuploadgrades.health as health',
                 'firstyearuploadgrades.research as research', 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('firstyearuploadgrades', 'firstyearuploadgrades.student_id', '=', 'enrollments.student_id')
        ->where('firstyearuploadgrades.student_id', '=', $id)
        ->where('enrollments.grade_school', '=', 1)
        ->get();

       $view_student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->first();

       $view_grade_students_second = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'secondyearuploadgrades.student_id as sy_student_id', 'secondyearuploadgrades.grading_period as sy_grading_period',
                 'secondyearuploadgrades.school_year_start as sy_school_year_start', 'secondyearuploadgrades.school_year_end as sy_school_year_end',
                 'secondyearuploadgrades.mathematics as mathematics', 'secondyearuploadgrades.science as science',
                 'secondyearuploadgrades.english as english', 'secondyearuploadgrades.ap as ap', 'secondyearuploadgrades.esp as esp',
                 'secondyearuploadgrades.filipino as filipino', 'secondyearuploadgrades.tle as tle', 'secondyearuploadgrades.music as music',
                 'secondyearuploadgrades.arts as arts', 'secondyearuploadgrades.pe as pe', 'secondyearuploadgrades.health as health', 
                 'secondyearuploadgrades.research as research', 'secondyearuploadgrades.advance_biology as advance_biology', 
                 'secondyearuploadgrades.statistics as statistics', 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('secondyearuploadgrades', 'secondyearuploadgrades.student_id', '=', 'enrollments.student_id')
        ->where('secondyearuploadgrades.student_id', '=', $id)
        ->where('enrollments.grade_school', '=', 2)
        ->get();

       $view_student_details_second = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 2)->first();

       $view_grade_students_third = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'thirdyearuploadgrades.student_id as ty_student_id', 'thirdyearuploadgrades.grading_period as ty_grading_period',
                 'thirdyearuploadgrades.school_year_start as ty_school_year_start', 'thirdyearuploadgrades.school_year_end as ty_school_year_end',
                 'thirdyearuploadgrades.mathematics as mathematics', 'thirdyearuploadgrades.science as science', 'thirdyearuploadgrades.english as english', 
                 'thirdyearuploadgrades.ap as ap', 'thirdyearuploadgrades.esp as esp', 'thirdyearuploadgrades.filipino as filipino', 'thirdyearuploadgrades.tle as tle',
                 'thirdyearuploadgrades.music as music', 'thirdyearuploadgrades.arts as arts', 'thirdyearuploadgrades.pe as pe', 'thirdyearuploadgrades.health as health',
                 'thirdyearuploadgrades.research as research', 'thirdyearuploadgrades.enhanced_algebra as enhanced_algebra', 'thirdyearuploadgrades.advance_chemistry as advance_chemistry', 
                 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('thirdyearuploadgrades', 'thirdyearuploadgrades.student_id', '=', 'enrollments.student_id')
        ->where('thirdyearuploadgrades.student_id', '=', $id)
        ->where('enrollments.grade_school', '=', 3)
        ->get();

       $view_student_details_third = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 3)->first();

       $view_grade_students_fourth = Enrollment::query()
        ->select('gradeschools.gr_school AS gr_school', 'gradeschools.gr_school_id AS gr_school_id', 
                 'gradeschools.created_at as gr_created_at', 'gradeschools.updated_at AS gr_updated_at',
                 'fourthyearuploadgrades.student_id as foy_student_id', 'fourthyearuploadgrades.grading_period as foy_grading_period',
                 'fourthyearuploadgrades.school_year_start as foy_school_year_start', 'fourthyearuploadgrades.school_year_end as foy_school_year_end',
                 'fourthyearuploadgrades.mathematics as mathematics', 'fourthyearuploadgrades.science as science', 'fourthyearuploadgrades.english as english', 
                 'fourthyearuploadgrades.ap as ap', 'fourthyearuploadgrades.esp as esp', 'fourthyearuploadgrades.filipino as filipino', 
                 'fourthyearuploadgrades.tle as tle', 'fourthyearuploadgrades.music as music', 'fourthyearuploadgrades.arts as arts', 
                 'fourthyearuploadgrades.pe as pe', 'fourthyearuploadgrades.health as health', 'fourthyearuploadgrades.research as research', 
                 'fourthyearuploadgrades.advance_physics as advance_physics', 'fourthyearuploadgrades.calculus as calculus', 'enrollments.*')
        ->leftJoin('gradeschools', 'enrollments.grade_school', '=', 'gradeschools.gr_school_id')
        ->leftJoin('fourthyearuploadgrades', 'fourthyearuploadgrades.student_id', '=', 'enrollments.student_id')
        ->where('fourthyearuploadgrades.student_id', '=', $id)
        ->where('enrollments.grade_school', '=', 4)
        ->get();

       $view_student_details_fourth = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 4)->first();

       $data = [
        'view_student_details' => $view_student_details,
        'view_grade_students' => $view_grade_students,
        'view_student_details_second' => $view_student_details_second,
        'view_grade_students_second' => $view_grade_students_second,
        'view_student_details_third' => $view_student_details_third,
        'view_grade_students_third' => $view_grade_students_third,
        'view_student_details_fourth' => $view_student_details_fourth,
        'view_grade_students_fourth' => $view_grade_students_fourth
       ];

        $pdf = Pdf::loadView('upload_grades.third_year.view_pdf', $data);
 
        return $pdf->download();
      }
}

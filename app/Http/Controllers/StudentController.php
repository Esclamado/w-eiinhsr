<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    public function index_first_year_grades() 
    {
        $id = auth()->user()->student_id;

        $view_grade_1st = Enrollment::query()
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

        $view_student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 1)->first();

        return view('student.first_year_grades.index', compact('view_grade_1st', 'view_student_details'));
    }

    public function index_second_year_grades() 
    {
        $id = auth()->user()->student_id;

        $view_grade_2nd = Enrollment::query()
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

       $view_student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 2)->first();
       
        return view('student.second_year_grades.index', compact('view_grade_2nd', 'view_student_details'));
    }

    public function index_third_year_grades() 
    {
        $id = auth()->user()->student_id;

        $view_grade_3rd = Enrollment::query()
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
       
        return view('student.third_year_grades.index', compact('view_grade_3rd', 'view_student_details'));
    }

    public function index_fourth_year_grades() 
    {
        $id = auth()->user()->student_id;

        $view_grade_4th = Enrollment::query()
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

       $view_student_details = DB::table('enrollments')->where('enrollments.student_id', '=', $id)->where('enrollments.grade_school', '=', 4)->first();
       
        return view('student.fourth_year_grades.index', compact('view_grade_4th', 'view_student_details'));
    }

    public function view_password($id) {

        $user = User::query()->where('users.student_id', '=', $id)->first();
        
        return view('student.change_password', compact('user'));
    }

    public function update_pasword(Request $request, $id) {
        $request->validate([
            // 'oldpassword' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $user = User::query()->where('users.student_id', '=', $id)->first();
        $user->password = $request->input('password');
        $res = $user->save();

        if($res){
            return redirect()->route('student.change_password', $id)->with('success', 'Password is successfully updated!');
        }

        return redirect()->back()->with('error', 'Password is not match!');
    }
}

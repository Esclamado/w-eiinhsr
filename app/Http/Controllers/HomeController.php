<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Gradeschool;
use App\Models\Studentlabel;
use App\Models\Enrollmentlabel;
use App\Models\Studentsection;
use App\Models\Studenttype;


class HomeController extends Controller
{
    public function index(Request $request) {
        
        $enrollments = Enrollment::query()
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
       
        return view('admin.index', compact('enrollments'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {

        $check_enrollment = DB::select("SELECT * FROM enrollments 
                WHERE student_id='".$request->input('student_id')."' AND grade_school='".$request->input('grade_school')."'");

        if (!$check_enrollment == null) {
            $this->validate($request, [
                'student_id'            => 'required|numeric|',
                'first_name'            => 'required',
                'last_name'             => 'required',
                'address'               => 'required',
                'age'                   => 'required|numeric',
                'enrollment_status'     => 'required',
                'grade_school'          => 'required|unique:enrollments,grade_school',
                'student_status'        => 'required',
                'school_year_start'     => 'required',
                'school_year_end'       => 'required',
                'student_type'          => 'required',
                'sex'                   => 'required',
                'birthdate'             => 'required',
            ]);

            $enrollment = Enrollment::create([
                'student_id'         => $request->input('student_id'),
                'first_name'         =>  $request->input('first_name'),
                'last_name'          =>  $request->input('last_name'),
                'address'            =>  $request->input('address'),
                'age'                =>  $request->input('age'),
                'enrollment_status'  =>  $request->input('enrollment_status'),
                'grade_school'       =>  $request->input('grade_school'),
                'student_status'     =>  $request->input('student_status'),
                'school_year_start'  =>  $request->input('school_year_start'),
                'school_year_end'    =>  $request->input('school_year_end'),
                'student_type'       =>  $request->input('student_type'),
                'student_sections'   =>  $request->input('student_sections'),
                'middle_name'        =>  $request->input('middle_name'),
                'name_extn'          =>  $request->input('name_extn'),
                'birthdate'          =>  $request->input('birthdate'),
                'sex'                =>  $request->input('sex')
            ]);

            $check_student_id = User::query()
            ->select('users.*')
            ->where('users.student_id', $request->student_id)
            ->first();
            
            if (!$check_student_id == null) {
                console(' existing');
            } else {
            $create_student_account = User::create([
                    'student_id'        =>  $request->student_id,
                    'name'              =>  $request->first_name .' '. $request->last_name,
                    'email'             =>  Str::lower(str_replace(' ', '', $request->first_name))  .''. Str::lower(str_replace(' ', '', $request->last_name)) .''. '@gmail.com',
                    'user_access'       =>  '3',
                    'password'          =>  Str::lower($request->last_name) .''. $request->age,
                ]);
            }
        } else {
            $this->validate($request, [
                'student_id'            => 'required|numeric|',
                'first_name'            => 'required',
                'last_name'             => 'required',
                'address'               => 'required',
                'age'                   => 'required|numeric',
                'enrollment_status'     => 'required',
                'grade_school'          => 'required',
                'student_status'        => 'required',
                'school_year_start'     => 'required',
                'school_year_end'       => 'required',
                'student_type'          => 'required',
                'sex'                   => 'required',
                'birthdate'             => 'required',
            ]);
            
            $enrollment = Enrollment::create([
                'student_id'         => $request->input('student_id'),
                'first_name'         =>  $request->input('first_name'),
                'last_name'          =>  $request->input('last_name'),
                'address'            =>  $request->input('address'),
                'age'                =>  $request->input('age'),
                'enrollment_status'  =>  $request->input('enrollment_status'),
                'grade_school'       =>  $request->input('grade_school'),
                'student_status'     =>  $request->input('student_status'),
                'school_year_start'  =>  $request->input('school_year_start'),
                'school_year_end'    =>  $request->input('school_year_end'),
                'student_type'       =>  $request->input('student_type'),
                'student_sections'   =>  $request->input('student_sections'),
                'middle_name'        =>  $request->input('middle_name'),
                'name_extn'          =>  $request->input('name_extn'),
                'birthdate'          =>  $request->input('birthdate'),
                'sex'                =>  $request->input('sex')
            ]);

            $check_student_id = User::query()
            ->select('users.*')
            ->where('users.student_id', $request->student_id)
            ->first();
            
            if (!$check_student_id == null) {
                return redirect()->route('admin.create')->with('success', $request->first_name .' '. $request->last_name .' '. "succesfully enrolled.");
            } else {
            $create_student_account = User::create([
                    'student_id'        =>  $request->student_id,
                    'name'              =>  $request->first_name .' '. $request->last_name,
                    'email'             =>  Str::lower(str_replace(' ', '', $request->first_name))  .''. Str::lower(str_replace(' ', '', $request->last_name)) .''. '@gmail.com',
                    'user_access'       =>  '3',
                    'password'          =>  Str::lower($request->last_name) .''. $request->age,
                ]);
            }
        }
    
        if ($enrollment) {
            return redirect()->route('admin.create')->with('success', $request->first_name .' '. $request->last_name .' '. "succesfully enrolled.");
        }
    }

    public function view($id) {
        $view_student = Enrollment::findorFail($id); 
        return view('admin.view', compact('view_student'));
    }

    public function destroy($id) {
        $delete_student = Enrollment::findorFail($id); 
        if($delete_student->delete()) {
            return redirect()->back()->with('success', 'Student succesfully deleted');
        } else {
            return redirect()->back()->with('error', 'Error on deleting');
        }
    }

    public function edit($id) {
        $edit_students = Enrollment::findorFail($id);
        $grade_schools = Gradeschool::query()->get();
        $student_status = Studentlabel::query()->get();
        $enrollment_status = Enrollmentlabel::query()->get();
        $student_section = Studentsection::query()->get();
        $student_type = Studenttype::query()->get();
        
        return view('admin.edit', compact('edit_students', 'grade_schools', 'student_status', 'enrollment_status', 'student_section', 'student_type'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'student_id'            => 'required|numeric|',
            'first_name'            => 'required',
            'last_name'             => 'required',
            'address'               => 'required',
            'age'                   => 'required|numeric',
            'enrollment_status'     => 'required',
            'grade_school'          => 'required',
            'student_status'        => 'required',
            'school_year_start'     => 'required',
            'school_year_end'       => 'required',
        ]);

        $update_student = Enrollment::findorFail($id);
        $update_student->student_id = $request->input('student_id');
        $update_student->first_name = $request->input('first_name');
        $update_student->last_name = $request->input('last_name');
        $update_student->address = $request->input('address');
        $update_student->age = $request->input('age');
        $update_student->enrollment_status = $request->input('enrollment_status');
        $update_student->grade_school = $request->input('grade_school');
        $update_student->student_status = $request->input('student_status');
        $update_student->school_year_start = $request->input('school_year_start');
        $update_student->school_year_end = $request->input('school_year_end');
        $update_student->student_type = $request->input('student_type');
        $update_student->student_sections = $request->input('student_sections');

        $res = $update_student->update();

        if($res)
        {
            return redirect()->route('admin.edit', $id)->with('success', "Student" .' '. $request->first_name .' '. $request->last_name .' '. "succesfully updated.");
        }

        return redirect()->route('admin.edit', $id)->with('success', "Student" .' '. $request->first_name .' '. $request->last_name .' '. "succesfully updated.");
    }
}

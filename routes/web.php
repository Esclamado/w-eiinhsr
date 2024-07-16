<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/', function () {
         
            return redirect()->route('login.show');
        });
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
        // Route::get('/{any}', 'LoginController@error_page');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        
         //Enrollment
        Route::get('/admin', 'HomeController@index')->name('admin.index');
        Route::get('/admin/enroll_student/create', 'HomeController@create')->name('admin.create');
        Route::post('/admin/enroll_student/store', 'HomeController@store')->name('admin.store');
        Route::get('/admin/view/enroll_student/{id}', 'HomeController@view')->name('admin.view');
        Route::post('/admin/delete_student/{id}', 'HomeController@destroy')->name('admin.destroy');
        Route::get('/admin/edit/{id}', 'HomeController@edit')->name('admin.edit');
        Route::post('/admin/update/{id}', 'HomeController@update')->name('admin.update');
    

        //Upload Grades 1st Year HS
        Route::get('/upload_grades/first_year/index', 'UploadGradesFirstYearController@index')->name('upload_grades.first_year.index');
        Route::get('/upload_grades/first_year/create/{id}', 'UploadGradesFirstYearController@create')->name('upload_grades.first_year.create');
        Route::post('/upload_grades/first_year/store', 'UploadGradesFirstYearController@store')->name('upload_grades.first_year.store');
        Route::get('/upload_grades/first_year/view/{id}', 'UploadGradesFirstYearController@view')->name('upload_grades.first_year.view');
        Route::get('/upload_grades/first_year/edit/{id}', 'UploadGradesFirstYearController@edit')->name('upload_grades.first_year.edit');
        Route::post('/upload_grades/first_year/update/{id}', 'UploadGradesFirstYearController@update')->name('upload_grades.first_year.update');
        Route::get('/upload_grades/first_year/view_pdf/{id}', 'UploadGradesFirstYearController@createPDF');

        //Upload Grades 2nd Year HS
        Route::get('/upload_grades/second_year/index', 'UploadGradesSecondYearController@index')->name('upload_grades.second_year.index');
        Route::get('/upload_grades/second_year/view/{id}', 'UploadGradesSecondYearController@view')->name('upload_grades.second_year.view');
        Route::get('/upload_grades/second_year/create/{id}', 'UploadGradesSecondYearController@create')->name('upload_grades.second_year.create');
        Route::post('/upload_grades/second_year/store', 'UploadGradesSecondYearController@store')->name('upload_grades.second_year.store');
        Route::get('/upload_grades/second_year/edit/{id}', 'UploadGradesSecondYearController@edit')->name('upload_grades.second_year.edit');
        Route::post('/upload_grades/second_year/update/{id}', 'UploadGradesSecondYearController@update')->name('upload_grades.second_year.update');
        Route::get('/upload_grades/second_year/view_pdf/{id}', 'UploadGradesSecondYearController@createPDF');

        //Upload Grades 3rd Year HS
        Route::get('/upload_grades/third_year/index', 'UploadGradesThirdYearController@index')->name('upload_grades.third_year.index');
        Route::get('/upload_grades/third_year/view/{id}', 'UploadGradesThirdYearController@view')->name('upload_grades.third_year.view');
        Route::get('/upload_grades/third_year/create/{id}', 'UploadGradesThirdYearController@create')->name('upload_grades.third_year.create');
        Route::post('/upload_grades/third_year/store', 'UploadGradesThirdYearController@store')->name('upload_grades.third_year.store');
        Route::get('/upload_grades/third_year/edit/{id}', 'UploadGradesThirdYearController@edit')->name('upload_grades.third_year.edit');
        Route::post('/upload_grades/third_year/update/{id}', 'UploadGradesThirdYearController@update')->name('upload_grades.third_year.update');
        Route::get('/upload_grades/third_year/view_pdf/{id}', 'UploadGradesThirdYearController@createPDF');

        //Upload Grades 4th Year HS
        Route::get('/upload_grades/fourth_year/index', 'UploadGradesFourthYearController@index')->name('upload_grades.fourth_year.index');
        Route::get('/upload_grades/fourth_year/view/{id}', 'UploadGradesFourthYearController@view')->name('upload_grades.fourth_year.view');
        Route::get('/upload_grades/fourth_year/create/{id}', 'UploadGradesFourthYearController@create')->name('upload_grades.fourth_year.create');
        Route::post('/upload_grades/fourth_year/store', 'UploadGradesFourthYearController@store')->name('upload_grades.fourth_year.store');
        Route::get('/upload_grades/fourth_year/edit/{id}', 'UploadGradesFourthYearController@edit')->name('upload_grades.fourth_year.edit');
        Route::post('/upload_grades/fourth_year/update/{id}', 'UploadGradesFourthYearController@update')->name('upload_grades.fourth_year.update');
        Route::get('/upload_grades/fourth_year/view_pdf/{id}', 'UploadGradesFourthYearController@createPDF');
    
        //Student
        Route::get('/faculty', 'FacultyController@index')->name('faculty.index');
        Route::get('/student/first_year_grades/index', 'StudentController@index_first_year_grades')->name('student.first_year_grades.index');
        Route::get('/student/second_year_grades/index', 'StudentController@index_second_year_grades')->name('student.second_year_grades.index');
        Route::get('/student/third_year_grades/index', 'StudentController@index_third_year_grades')->name('student.third_year_grades.index');
        Route::get('/student/fourth_year_grades/index', 'StudentController@index_fourth_year_grades')->name('student.fourth_year_grades.index');
        Route::get('/student/change_password/{id}', 'StudentController@view_password')->name('student.change_password');
        Route::post('/student/update_password/{id}', 'StudentController@update_pasword')->name('student.update_password');
    });


    Route::get('/{any}', 'LoginController@error_page');
   
});

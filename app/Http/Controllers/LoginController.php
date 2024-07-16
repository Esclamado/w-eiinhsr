<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('/login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {  
        $user_roles = $user->user_access;
        if ($user_roles == "2") {
            return redirect('/upload_grades/first_year/index')->with('success', ucwords($user->name) .' '. "Succesfully Login.");
        } else if ($user_roles == "3") {
            return redirect('/student/first_year_grades/index')->with('success', ucwords($user->name) .' '. " Succesfully Login.");
        } else if ($user_roles == "4") {
            return redirect('/admin')->with('success', ucwords($user->name) .' '. " Succesfully Login.");
        } else {
            return redirect('/admin')->with('success', ucwords($user->name) .' '. " Succesfully Login.");
        }
    }

    public function error_page(){
        return view('errors.404'); 
    }
}

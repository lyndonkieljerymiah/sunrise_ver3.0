<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Result;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        return $user;
    }

    public function showLoginForm()
    {

        $token =[
            "CSRF_TOKEN"    =>  csrf_token(),
            "grant_type"    =>  "csrf"
        ];

        return $token;

    }

    public function logout(Request $request) {

        $this->guard()->logout();

        $request->session()->invalidate();

        return ["ok" => true, "message" => "success"];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        return Result::loginFailed($errors);
    }
}

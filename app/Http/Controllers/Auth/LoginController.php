<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\constants;

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
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')->with('error', trans('auth.failed'));
    }

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
        $this->middleware(function ($request, $next) {
            // Redirect authenticated users away from the login page
            if (Auth::check() && $request->is('login')) {
                return redirect('/admin/dashboard');
            }
            return $next($request);
        })->except('logout');
    }
    
    protected function authenticated(Request $request, $user)
    {
        
        return redirect()->intended($this->redirectPath());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // if (Auth::user()->email_verified_at) {
                $request->session()->regenerate();
                return response()->json(['message' => 'Logged in','redirectURL' => route('portal.dashboard')], SUCCESS_CODE);
            // } else {
            //     Auth::logout();
               
            //     return response()->json(['message' =>'VERIFY YOUR EMAIL'], ABORT_CODE);
            // }
        }
       
        return response()->json(['message' => 'The provided credentials do not match our records.'], UNAUTHORITED_CODE);
        
    }

        public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login'); // Redirect to the login page after logout
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * this function handles logging in a user 
     * it needs to validate data from login form search for the 
     * corresponding user instance, and last verify if data match record
     * within database
     */
    public function login(Request $request)
    {
        //validate data coming from the login form 
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //if authentication is succesefull
        if(Auth::attempt($credentials))
        {
            //this method accepts an array of key/value pairs
            //the values in the array will be used to retreive the corresponding user from DB
            //laravel will automatically hash the user password from login form and compare it with the one in DB 
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success','welcome back '.$request->user()->name );
        }

        return back()
        ->withErrors(['email' => 'the provided credentials don\'t match our records !'])
        ->onlyInput('email');

    }


    /**this function handles
     * logging out a user from the app
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}

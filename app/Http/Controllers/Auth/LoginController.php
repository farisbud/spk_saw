<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    public function index(){

        return view('login');

    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    // public function username()
    // {
    // return 'username';
    // }

    

    public function authenticate(Request $request)
    {

        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5',
        ]);

        
        $credentials = $request->only('username', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }else{
            return back()->with('gagal','User dan password tidak ditemukan');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request){
       
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

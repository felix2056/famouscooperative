<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::login($user);

            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $log = new Log();
                $log->message = 'User ' . Auth::user()->full_name . ' logged in';
                $log->type = 'success';
                $log->icon = 'fa fa-sign-in';
                $log->image = Auth::user()->profile_pic_url;
                $log->save();

                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        return view('auth.login');
    }

    public function logout()
    {
        $log = new Log();
        $log->message = 'User ' . Auth::user()->full_name . ' logged out';
        $log->type = 'danger';
        $log->icon = 'fa fa-sign-out';
        $log->image = Auth::user()->profile_pic_url;
        $log->save();
        
        Auth::logout();
        
        return redirect()->route('login');
    }
}

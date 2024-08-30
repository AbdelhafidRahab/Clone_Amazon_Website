<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }
    public function register() {
        return view('register');
    }

    public function register_done(Request $request) {
        $request->validate([
            'email' => 'unique:users'
        ],[
            'email.unique' => 'Try another email'
        ]);

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->remember_token = $request->_token;
        $user->password = Hash::make($request->password);

        $res = $user->save();
        if ($res) {
            return back()->with('success','You have been successfully registered, you can now login');
        } else {
            return back()->with('fail','Something is wrong, try again');
        }
    }

    public function login_done(Request $request) {
        $user = User::where('email','=',$request->email)->first();
        if ($user && Hash::check($request->password,$user->password)) {
            $request->session()->put('loginID',$user->id);
            return redirect('/');
        }
        return back()->with('fail','We cannot find an account with that information');
    }

    public function logout() {
        if (session()->has('loginID')) {
            session()->pull('loginID');
            return redirect('/');
        }
    }
}

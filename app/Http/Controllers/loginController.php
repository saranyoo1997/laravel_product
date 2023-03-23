<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function index(){
        return view('member.login');
    }

    function post(Request $request){
        $validate = $request->validate([
            'username' => 'required|string|min:5|exists:users,username',
            'password' => 'required|string|min:3',
        ]);
        

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->withErrors([
            'password' => 'Password Wrong',
        ])->onlyInput('username');
    }

    public function logout(Request $request){
       
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('swal',"Logout Success");
        return redirect()->route('login');
    }
}

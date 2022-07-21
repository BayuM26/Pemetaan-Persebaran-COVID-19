<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('login',[
            'title' => 'Login'
        ]);
    }

    public function ceklogin(Request $request){
        $cek = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($cek)){
            $request->session()->regenerate();
            
            if(auth()->user()->hak_akses === 'admin'){
                return redirect()->intended('admin');
            }else{
                return redirect()->intended('dashboard');
            }
        }

        return back();
    }

    
}

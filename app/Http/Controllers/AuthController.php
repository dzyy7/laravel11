<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    function tampilRegistrasi(){
        return view('admin_view.registrasi');
    }
    function submitRegistrasi(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //dd($user);
        return redirect('/login');
    }
    function tampilLogin() {
        return view('admin_view.login');
    }
    function submitLogin(Request $request) {
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('admin.tampil');
        }else{
            return redirect()->back()->with('gagal','email/password salah');
        }
    }
}

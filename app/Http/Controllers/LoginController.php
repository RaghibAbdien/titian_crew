<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('pages.login-page');
    }

    public function login(Request $request){
        $infoLogin = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt($infoLogin)) {
                $request->session()->regenerate();
                return to_route('dashboard');
            } else {
                return redirect('/')->with('error', 'Password atau Email anda salah!');
            }
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
        
    }
}

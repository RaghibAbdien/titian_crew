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
        return view('login-page');
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

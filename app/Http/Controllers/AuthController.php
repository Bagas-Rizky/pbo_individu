<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    function login() {
    return view('admin.login');
    }

    function authenticate(Request $request) {
        // dd($request->all());
        $credentials = Validator::make($request->all(), [
            
            'email'  => 'required|email',
            'password'  => 'required',
        ]);

        if ($credentials->fails()) {
            // dd($request->all());
            return back()->with('warning', $credentials->messages()->first());
        }

        // unset($credentials->valid()['_token']);
        $check = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials->valid());
        if (Auth::attempt($check)) {
            // $request->session()->regenerate();
            // dd($credentials);

            $user = User::where('email', $check['email'])->first();

            
            // dd(auth()->user());

            if ($user->level == 'admin') {
                // dd($user);
                return redirect()->route('admin/dashboard')->with('success', 'Berhasil login');
            } // halaman use
        }
        return redirect()->route('login')->with('error', 'Email atau password anda salah');

    }
    
    // function register() {
    //     return view('auth.register');
    // }

    // function createRegister(Request $request) {
    //     $request->validate([
    //         'nama' => 'required',
    //         'whatsapp' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $request['level'] = 'user';
    //     $request['password'] = bcrypt($request['password']);

    //     User::create($request->all());
        
    //     return redirect()->route('register')->with('success', 'Berhasil membuat akun!');
    // }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}

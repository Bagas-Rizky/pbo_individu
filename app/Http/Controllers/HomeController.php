<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->get();

        return view('frontend.homepage', compact('mobils'));
    }
    
    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(Request $request) 
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        Message::create($data);

        return redirect()->back()->with([
            'message' => 'Pesan anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
    }

    public function detail($id)
    {
        $mobil = Mobil::where('id', $id)->first();

        return view('frontend.detail', compact('mobil'));
    }

    public function login()
    {
        return view('admin.login');
    }

    // public function loginakun(Request $request)
    // {
    //     Session::flash( 'email', $request->email, 'password', $request->password);
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ],[
    //         'email' => 'Email Wajib Diisi',
    //         'password' => 'Password Wajib Diisi'
    //     ]);

    //     $infologin = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
    //     if (Auth::attempt($infologin)) {
    //         //Berhasil
    //         return redirect('admin/dashboard')->with('Succes');
    //     } else {
    //         //Gagal
    //         return redirect('login')->withErrors('Username Dan Password Salah');
    //     }
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('login')->with('succes');
    // }
}

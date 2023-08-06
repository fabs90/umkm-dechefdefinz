<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('authentication/login');
    }

    public function login(UserLoginRequest $request)
    {
        // Masukan ke flash username agar inputan yang
        Session::flash('username', $request->input('username'));
        // Lakukan validasi terhadap inputan
        $validated = $request->validated();

        // Dapetin inputan user yg udah divalidasi dan masukan kedalam variabel
        $infoLogin = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        // Cek apakah inputan sama dengan database
        if (Auth::attempt($infoLogin)) {
            // kalo cocok, arahkan ke halaman admin
            return redirect(route('adminPage'));
        } else {
            // Kalo ga cocok kasih error
            $request->session()->flash('custom_error', 'Username atau Password yang dimasukan salah!');
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function register()
    {
        return view('authentication/register');
    }

    public function create()
    {
        // Register logic
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Pendaftaran berhasil');
            return redirect('/login');
        } else {
            Session::flash('status', 'Failed');
            Session::flash('message', 'Pendaftaran gagal');
            return back()->withInput();
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'], 
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Login berhasil');

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('status', 'Failed');
        Session::flash('message', 'Email atau password salah');
        return back()->withInput();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $user->email;
        $user->no_hp = $request->no_hp;
        $user->save();

        if ($user) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Profil berhasil diperbarui');
            return redirect('/profile');
        } else {
            Session::flash('status', 'Failed');
            Session::flash('message', 'Profil gagal diperbarui');
            return back()->withInput();
        }
    }
}

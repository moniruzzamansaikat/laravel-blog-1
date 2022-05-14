<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function get_login()
    {
        return view('pages.login');
    }

    public function get_register()
    {
        return view('pages.register');
    }

    public function handle_login(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($data)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect()->route('dashboard.index');
    }

    public function handle_register(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->withErrors(['message' => 'Something went wrong']);
        }

        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login.form');
    }
}

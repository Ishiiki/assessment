<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('Auth.register');
    }

   
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['email', 'unique:users'],
            'password' => ['required' ,'confirmed' ,'min:3'],
            'role' => ['required'],
        ]);

        if (User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ])){
            return back()->with('success', 'Registered Succesfully!');
        }

        abort(404);

    }

    public function login(){
        return view('Auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','confirmed'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect()->route('user.dashboard');
        }

       return back()->withErrors([
            'email' => 'This Email is not registered',
       ])->onlyInput('email');
    }

}

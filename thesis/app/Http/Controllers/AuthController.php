<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
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
        return view('Auth.register',[
            'title' => 'Register',
            'roles' => Roles::get(),
            'user' => User::get(),
        ]);
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
        ])){
            
           if (User::where('email',$request->email)->exists()) {
                $user = User::where('email',$request->email)->first();
                UserRoles::create([
                    'user_id' => $user->id,
                    'roles_id' => $request->role
                ]);
                return back()->with('success', 'Registered Succesfully!');
           }

           return back()->with('success', 'Something Wentt Wrong!');
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

    public function create_role(){
        Roles::create([
            'role_name' => 'Student'
        ]);

        Roles::create([
            'role_name' => 'School'
        ]);

    }


}

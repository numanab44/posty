<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'name'      => 'required|max:225',
            'username'  => 'required|max:225',
            'email' => 'required|email|max:225',
            'password' => 'required|confirmed',

        ]);
        //store user

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        // sign the user in
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        //auth()->attempt([$request->only('email','password')]);


        //redirect
        return redirect()->route('dashboard');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('profile');
    }
    public function update(Request $request)
    {
        //validation
        $this->validate($request,[
        'name' => 'required|max:225',
        'username' => 'required|max:225',
        'email' => 'required|email|max:225',

        ]);

        $user = auth()->user();
         $user->fill([
         'name' => $request->name,
         'username' => $request->username,
         'email' => $request->email
         ]);
         $user->save();
        return redirect()->back()->with('success', 'Profile Updated!');
    }
}

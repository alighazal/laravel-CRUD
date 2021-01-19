<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
       $this->middleware(['guest']);
    }

    public function index () {

        return view("auth.register");
    }

    public function store (Request $request) {

        $this->validate($request, [
            "name"      => ["required", 'max:255'],
            "email"     => "required|max:255|email",
            "username"  => "required|max:255",
            "password"  => "required|confirmed",
        ]);
            
        //dd('here');

        User::create([

            "name" => $request->name,
            "email" => $request->email,
            "username" => $request->username,
            "password" => Hash::make($request->password)
            
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return back();    

    }

}

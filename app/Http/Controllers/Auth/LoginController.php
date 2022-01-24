<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    ::attempt()
    The attempt method is normally used to handle authentications from your applications 'login form.'
    If authentication is successful, you should regenerate the users session to prevent session fixation.
    The attempt method accepts array of key / value pairs as its first argument. The value in array will be used to find the user in your database.
    Attempt method will return TRUE if login was successful else it will return FALSE.

    $remember
    This is for a remember me checkbox. If this value is TRUE. Laravel will keep the user authenticated indefinitely or until manually logout. 
    Users table MUST include the string remember_token column, which will be used to store the "remember me" token.
*/

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(Auth::user());
        }

        return response()->json([
            'The provided credentials do not match our records.'
        ]);
    }

    public function me()
    {
       $user = Auth::user(); 

       return response()->json($user);
    }
}

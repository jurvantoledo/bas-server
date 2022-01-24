<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
    logout()
    To manually log users out of your app, you may use the logout method provided by Auth.
    This will remove the authentication information from the users session so that subsequent requests are not authenticated.

    In addition to calling the logout method, it is recommended that you invalidate the user's session and regenerate their CSRF token. 
    After logging the user out, you would typically redirect the user to the root of your application
*/

class LogoutController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}

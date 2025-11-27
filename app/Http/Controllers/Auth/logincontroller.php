<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        return redirect(RouteServiceProvider::redirectToRoleHome());
    }
}

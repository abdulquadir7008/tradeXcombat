<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserForgetPasswordController extends Controller
{
    public function showUserLoginForm()
    {
        return view('user.password');
    }
}

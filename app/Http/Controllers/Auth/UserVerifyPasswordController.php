<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserVerifyPasswordController extends Controller
{
    public function showUserLoginForm()
    {
        return view('user.verify');
    }
}

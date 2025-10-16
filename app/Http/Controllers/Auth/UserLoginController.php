<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    /**
     * Shows the user-facing login form view.
     */
    public function showUserLoginForm()
    {
        // This command looks for 'resources/views/user/login.blade.php'
        return view('user.login');
    }
}

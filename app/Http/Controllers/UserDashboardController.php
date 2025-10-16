<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Shows the main user-facing dashboard.
     * This view will primarily use JavaScript/Vue/React to fetch data
     * from the Group Combat API endpoints.
     */
    public function index()
    {
        // This will look for a file at 'resources/views/user/dashboard.blade.php'
        return view('user.dashboard');
    }
}

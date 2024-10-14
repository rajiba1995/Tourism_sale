<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     // Apply the auth middleware to ensure the user is authenticated
    //     $this->middleware('auth');

    //     // Abort with 403 for users who are not admins
    //     $this->middleware(function ($request, $next) {
    //         // Check if the user is authenticated and has an admin role
    //         // if (!Auth::check()) { // Assuming you have an `is_admin` attribute
    //             abort(403);
    //         // }
    //         return $next($request);
    //     });
    // }
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
}

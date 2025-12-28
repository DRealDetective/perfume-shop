<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // add this for password checking
use App\Models\Admin; // add this to access the Admin model

class AdminController extends Controller
{
    // 1️⃣ Show login page
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // 2️⃣ Handle login submission
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if admin exists
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Credentials OK → create session
            session(['admin_id' => $admin->id]);
            return redirect()->route('admin.dashboard');
        } else {
            // Wrong credentials → redirect back with error
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function logout()
{
    session()->forget('admin_id'); // clear admin session
    return redirect()->route('admin.login');
}
    public function dashboard()
{
    return view('admin.dashboard'); // loads resources/views/admin/dashboard.blade.php
}

}

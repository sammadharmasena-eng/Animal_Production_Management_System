<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerAuthController extends Controller
{
    /**
     * Show login form (if needed separately)
     */
    public function showLoginForm()
    {
        return view('farmer.login'); // optional view if you want a dedicated login page
    }
 public function loginFromRecord(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('farmer')->attempt($credentials)) {
            return redirect()->route('records.create'); // or farmer.dashboard
        }

        return back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout()
    {
        Auth::guard('farmer')->logout();
        return redirect()->route('farmer.login.form');
    }
}
    
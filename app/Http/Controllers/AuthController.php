<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\User;
  use Illuminate\Support\Facades\Auth;

 class AuthController extends Controller
 {
    // Show login/register form
    public function showLoginRegister()
    {
        return view('auth.login_register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'id_number' => 'required|string|unique:users',
            'phone_number' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_number' => $request->id_number,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string',
        ]);

        $user = User::where('id_number', $request->id_number)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'id_number' => 'Invalid ID Number.',
            ]);
        }
    }

    // Show home page
    public function home()
    {
        return view('home');
    }
     public function about()
    {
        return view('about');
    }
    public function record()
    {
        return view('record');
    }
    public function product()
    {
        return view('product');
    }
    public function sales()
    {
        return view('sales');
    }
   
    

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


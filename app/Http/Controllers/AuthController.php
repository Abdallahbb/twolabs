<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegisterForm(Request $request){
      return view('register');
    }
    public function showLoginForm(Request $request){
      return view('signin');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/^[A-Za-z0-9!@#$%^&*_,.?]{8,}$/'
            ],
        ], [
            'password.regex' => 'Password must be at least 8 characters long and can only contain letters, numbers, and special characters.',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->password = Hash::make($validated['password']);
        $user->save();
    

        Auth::login($user);
    
        return redirect()->intended('user_dashboard')->with('success', 'Registration was successful and you are now logged in.');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            // If login is successful, redirect to the intended page
             return redirect()->intended('/')->with('success', 'Login was successful');
        }
        // If login fails, redirect back with the email and an error message
        return redirect()->back()->withInput($request->only('email'))->with('error', 'These credentials do not match our records.');
    }
    public function reset(Request $request){
       $username = $request->username;
       $password = $request->password;
       $user = User::where('name', $username)->first();
       if($user){
         $user->update(['password'=> Hash::make($password)]);
         return redirect()->back()->with('success','Password was reset successfully');
       }
       return redirect()->back()->with('error',$username. ' was not found');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
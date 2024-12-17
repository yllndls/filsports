<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('user.auth.register');
    }

    public function registerPost(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'contact' => 'nullable|string',
            'location' => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required'
        ]);

        // Handle profile image upload if provided
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);
            $data['profile_image'] = $imageName;
        }

        User::create($data);
        return back()->with('success', 'Register successfully!');
    }

    public function login() {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            switch(auth()->user()->role) {
                case 'admin':
                    // dd($credentials);
                    return redirect('/admin') ->with('success', 'Login Successfully!');

                    break;
                case 'rider': 
                    // dd($credentials);
                    return redirect('/rider/dashboard') ->with('success', 'Login Successfully!');
                    break;
                case 'user':
                    // dd($credentials);
                    return redirect('/home') ->with('success', 'Login Successfully!');
                    break;
            }
        }
        // dd($request);

         return back()->with('error', 'Email or password incorrect.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}

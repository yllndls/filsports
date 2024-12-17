<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomerFeedback;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
  
    public function home() {
        return view ('user.home');
    }

    public function services() {
        return view ('user.services');
    }

    public function sports()
    {
        $categories = Category::all();
        return view('user.sports', compact('categories'));
    }

    public function orders() {
        return view('user.order');
    }

    public function about() {
        return view ('user.about');
    }

    public function myAccount()
    {
        $user = Auth::user();
        return view('user.myAccount', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact' => 'nullable|string',
            'location' => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle profile image upload if provided
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                $oldImagePath = public_path('profile_images/' . $user->profile_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);
            
            // Update the user data array with the new image
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'location' => $request->location,
                'delivery_address' => $request->delivery_address,
                'profile_image' => $imageName
            ];
        } else {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'location' => $request->location,
                'delivery_address' => $request->delivery_address
            ];
        }

        // Update user using the update method
        User::where('id', $user->id)->update($userData);

        return redirect()->route('user.myAccount')->with('success', 'Profile updated successfully!');
    }

}
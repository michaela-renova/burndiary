<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   public function uploadProfileImage(Request $request, User $user)
    {
        $user = auth()->user(); 

        $request->validate([
            'profile_image' => ['required', 'image'],
        ],[
            'profile_image.required' => "Nebyl vybrán soubor.",
        ]);

        
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }
        
        $path = $request->file('profile_image')->store('users', 'public');

        
        $user->update([
            'profile_image' => $path,
        ]);

        return back();

    }

    public function showUploadForm()
    {
        return view('upload-image');
    }


    public function deleteProfileImage(User $user)
    {
        $user = auth()->user(); 
       
        Storage::disk('public')->delete($user->profile_image);

        $user->update([
            'profile_image' => null,
        ]);

        return back();

    }
}


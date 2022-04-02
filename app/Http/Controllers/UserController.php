<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function userPage($id){
        $myUser = User::findOrFail($id);
        return view('user', [
            'user' => $myUser
        ]);
    }

    public function userModification($id){
        return view('userModification');
    }

    public function changeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required',
        ]);
        $path = Storage::disk('public')->put('avatar', $request->file('avatar'));
        // Upload the new avatar then delete the old one from the storage and finally add it in the avatar database
        $user = User::find(Auth::user()->id);
        // Just need to verify that the file that we wants to delete isn't the default image
        if (strcmp($user->avatar, 'avatar/default.png') != 0){
            Storage::disk('public')->delete($user->avatar);
        }
        $user->avatar = $path;
        $user->save();
        return redirect('/');
    }
}

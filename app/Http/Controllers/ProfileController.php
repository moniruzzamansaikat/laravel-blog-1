<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
            'confirm_password' => 'required',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save;

        return redirect()->route('dashboard');
    }

    public function update_info(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);

        if ($request->has('thumbnail')) {
           

            $this->validate($request, [
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // remove old thumbnail
            if ($user->thumbnail && file_exists(public_path('images/thumbnails/' . $user->thumbnail))) {
                unlink(public_path('images/thumbnails/' . $user->thumbnail));
            }

            $thumbnail = $request -> thumbnail;
            $thumbnail_name = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/thumbnails'), $thumbnail_name);
            $user->thumbnail = $thumbnail_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return back()->with('success', 'Profile updated successfully');
    }

    public function delete_account(){
        $id = auth()->user()->id;
        User::destroy($id);
        return redirect()->route('auth.login');
    }
}

<?php

namespace App\Http\Controllers;

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
}

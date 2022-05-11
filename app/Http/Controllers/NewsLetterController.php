<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:news_letters',
        ]);

        $newsLetter = new NewsLetter();
        $newsLetter->email = $request->email;
        $newsLetter->save();

        return back()->with('success', 'Thanks for subscribing!');
    }
}

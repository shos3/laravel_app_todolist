<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function mypage($id)
    {
        $user = User::findOrFail($id);
        $tweets = $user->tweets()->latest()->paginate(10);
        return view('tweets.mypage', compact('user', 'tweets'));
    }
}

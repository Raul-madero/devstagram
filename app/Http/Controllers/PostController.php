<?php

namespace App\Http\Controllers;

use App\Models\User;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user,
            // 'posts' => $user->posts()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}

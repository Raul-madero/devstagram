<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

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

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'descripcion' => 'required',
            'image' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'descripcion' => $request->descripcion,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        // Otra forma de agregar registros
        $post = new Post();
        $post->title = $request->title;
        $post->descripcion = $request->descripcion;
        $post->image = $request->image;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index', auth()->user()->user);
    }
}

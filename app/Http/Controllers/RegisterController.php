<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->get('user'));

        //Modificar el request para validar usuario
        $request->request->add(['user' => Str::slug($request->get('user'))]);

        //Validacion de formulario
        $request->validate([
            'name' => 'required|min:3|max:20',
            'user' => 'required|min:3|max:20|unique:users,user',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        // dd('Creando usuario...');
        User::create([
            'name' => $request->get('name'),
            'user' => $request->get('user'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        //Autenticar al usuario
        auth()->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        //Redireccionar
        return redirect()->route('posts.index')->with('success', 'Usuario creado correctamente');
    }
}

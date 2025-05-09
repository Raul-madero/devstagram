<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validar al usuario
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Comprobar credenciales
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            //Redireccionar al muro
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index', auth()->user()->user);;
    }
}

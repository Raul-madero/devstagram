@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email:
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu email"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                        @error('email') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }}</p> @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password:
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Tu password"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                        @error('password') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }}</p> @enderror
                </div>
                <div class="mb-5">
                    <label for="remember" class="inline-flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <span class="text-gray-700">Recordar mi cuenta</span>
                    </label>
                </div>
                <input type="submit" value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

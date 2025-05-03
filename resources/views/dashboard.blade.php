@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->name }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row md:justify-center">
            <div class="w-8/12 lg:w-1/2 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-1/2 p-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-xl text-gray-900 font-black mb-4">{{ $user->user }}</p>
                <p class="text-gray-800 text-sm mb-2 font-bold">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-2 font-bold">
                    0
                    <span class="font-normal">Seguidos</span>
                </p>
                <p class="text-gray-800 text-sm mb-2 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection

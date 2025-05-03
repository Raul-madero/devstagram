@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Crear Post
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes') }}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 mt-10 md:mt-0 bg-white rounded-lg shadow-xl">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo:
                    </label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Titulo"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                        @error('title') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }}</p> @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion:
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripcion de la imagen"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                        @error('descripcion') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }}</p> @enderror
                </div>
                <div class="mb-5">
                    <input
                        name="image"
                        type="hidden"
                        value="{{ old('image') }}">
                        @error('image') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{ $message }}</p> @enderror
                </div>
                <input type="submit" value="Crear Post"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

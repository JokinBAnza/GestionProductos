@extends('layout')

@section('content')
    <h2>Editar Categoría</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $category->nombre }}" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ $category->descripcion }}</textarea><br><br>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <br>
    <a href="{{ route('categories.index') }}">Volver al listado</a>
@endsection
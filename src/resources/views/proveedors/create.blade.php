@extends('layout')

@section('content')
    <h2>Crear Proveedor</h2>

    <form action="{{ route('proveedors.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del Proveedor:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="productos">Productos:</label><br>
        <select name="productos[]" id="productos" multiple>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Guardar Proveedor</button>
    </form>

    <br>
    <a href="{{ route('proveedors.index') }}">Volver al listado</a>
@endsection

@extends('layout')

@section('content')
    <h2>Editar Proveedor</h2>

    <form action="{{ route('proveedors.update', $proveedor) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del Proveedor:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}" required><br><br>

        <label for="productos">Productos:</label><br>
        <select name="productos[]" id="productos" multiple>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}" 
                    {{ $proveedor->productos->contains($producto->id) ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar Proveedor</button>
    </form>

    <br>
    <a href="{{ route('proveedors.index') }}">Volver al listado</a>
@endsection

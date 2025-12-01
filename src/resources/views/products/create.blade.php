@extends('layout')

@section('content')
    <h2>Crear Producto</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Proveedores</label>
        <select name="proveedores[]" multiple required>
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
            @endforeach
        </select>
        <label for="category_id">Categoría:</label><br>
        <select name="idCategoria" id="idCategoria" required>
            <option value="">-- Selecciona una categoría --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
            @endforeach
        </select><br><br>

        <label for="name">Nombre del Producto:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" name="precio" id="precio" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="cantidadStock" id="cantidadStock" required><br><br>

        <button type="submit">Guardar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection
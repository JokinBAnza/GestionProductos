@extends('layout')

@section('content')
    <h2>Listado de Productos</h2>
    <a href="{{ route('products.create') }}">Crear Nuevo Producto</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category->nombre }}</td>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->precio }} €</td>
                <td>{{ $product->cantidadStock }} u.</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form id="formBorrar" action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button id="botonBorrar" type="submit" onclick="return confirm('¿Borrar producto?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
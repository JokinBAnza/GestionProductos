@extends('layout')

@section('content')
    <h1>Almacén</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->nombre }}</h2>

        @if ($category->productos->isEmpty())
            <p>No hay productos en esta categoría.</p>
        @else
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->productos as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->precio }} €</td>
                            <td>{{ $product->cantidadStock }} u.</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}">Editar</a>

                                <form id="formBorrar" action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="botonBorrar" onclick="return confirm('¿Borrar producto?')">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <br>
    @endforeach

    <a href="{{ route('products.create') }}">Crear Nuevo Producto</a>
@endsection

@extends('layout')

@section('content')
<h1>Listado de Proveedores</h1>

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<a href="{{ route('proveedors.create') }}">Añadir nuevo proveedor</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Productos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedors as $proveedor)
        <tr>
            <td>{{ $proveedor->id }}</td>
            <td>{{ $proveedor->nombre }}</td>
            <td>
                @foreach($proveedor->productos as $producto)
                    {{ $producto->nombre }}@if(!$loop->last), @endif
                @endforeach
            </td>
            <td>
                <a href="{{ route('proveedors.edit', $proveedor->id) }}">Editar</a>

                <form id="formBorrar" action="{{ route('proveedors.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button id="botonBorrar" type="submit" onclick="return confirm('¿Seguro que quieres borrar este proveedor?')">
                        Borrar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

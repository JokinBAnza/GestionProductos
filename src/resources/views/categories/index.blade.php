@extends('layout')

@section('content')
    <h2>Listado de Categorías</h2>
    <a href="{{ route('categories.create') }}">Crear Nueva Categoría</a>
    <br><br>
<!-- Para capturar el error en caso de intentar borrar una categoria con productos en ella.-->
    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->nombre }}</td>
                <td>{{ $category->descripcion }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}">Editar</a>
                    
                    <form id="formBorrar" action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button id="botonBorrar" type="submit" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

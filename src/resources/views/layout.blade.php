<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Laravel</title>
    <link rel="stylesheet" href="{{ asset('layout.css') }}">
</head>

<body>
    <header>
        <h1>Gestión de Inventario</h1>
        <nav>
    <ul>
        <li><a href="{{ route('categories.index') }}">Categorías</a></li>
        <li><a href="{{ route('products.index') }}">Productos</a></li>
        <li><a href="{{ route('almacen.index') }}">Almacen</a></li>
        <li><a href="{{ route('proveedors.index') }}">Proveedores</a></li>

    </ul>

    <!-- Spacer empuja el usuario a la derecha -->
    <div class="spacer"></div>

    <a id="nombreUsuario" href="{{ route('perfil.index') }}" class="user-link">
        {{ $Usuario->nombre ?? 'Usuario' }}
    </a>
</nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel</p>
    </footer>
</body>
</html>
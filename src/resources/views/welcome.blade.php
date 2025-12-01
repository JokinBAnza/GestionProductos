@extends('layout')

@section('content')
<style>
        main {
           margin-left:10px;
        }
        li{
            margin-left:25px;
        }
    </style>
    <h2>Bienvenido a la gestión de productos</h2>
    <p>
        En este proyecto tienes acceso a 3 pestañas:
        <br>
        <ul>
            <li>Gestión de Productos</li>
            <li>Gestión de Categorias</li>
            <li>Almacen</li>
        </ul>
        <br>
        Gestión Productos: Para visualizar todos los productos. Podrás crear, eliminar y editar productos.
         <br>
        Gestión Categorias: Para visualizar todas las categorias. Podrás crear, eliminar y editar categorias.
         <br>
        En Almacén verás todas las categorías con sus productos.
    </p>
        <br>
        Ten en cuenta que si una categoría contiene algún producto, no podrá ser borrada.
        
@endsection
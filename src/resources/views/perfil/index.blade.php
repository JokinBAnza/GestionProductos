@extends('layout')

@section('content')
    <h1>Perfil de {{$Usuario->nombre}}</h1>

   
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $Perfil->id }}</td>
                            <td>{{ $Usuario->nombre }}</td>
                            <td>{{ $Perfil->edad }}</td>
                            <td>{{ $Perfil->sexo }}</td>
                             <td>{{ $Perfil->email }}</td>
                        </tr>
                </tbody>
            </table>
        <br>
@endsection
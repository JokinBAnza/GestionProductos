<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;

class AlmacenController extends Controller{
    public function index(){
        $Usuario = Usuario::find(1);
        $categories=Categoria::with('productos')->get();
        return view('almacen.index', compact('categories', 'Usuario'));
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Usuario = Usuario::find(1);
        $products = Producto::with('category', 'proveedores')->get();

        return view('products.index', compact('products', 'Usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categoria::all();
         $proveedores = Proveedor::all();
        
        return view('products.create', compact('categories', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidadStock' => 'required|integer',
            'proveedores' => 'required|array|min:1',       // Al menos un proveedor
            'proveedores.*' => 'exists:proveedors,id',
        ]);

        $producto = Producto::create($request->only('idCategoria','nombre','precio','cantidadStock'));

        // Guardar la relación N:M en la tabla pivote
        $producto->proveedores()->sync($request->proveedores);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $product)
    {
        $categories = Categoria::all();
        $proveedores = Proveedor::all();
        
        return view('products.edit', compact('product', 'categories', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $product)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidadStock' => 'required|integer',
            'proveedores' => 'required|array|min:1',
            'proveedores.*' => 'exists:proveedors,id',
        ]);

        $product->update($request->all());
        $product->proveedores()->sync($request->proveedores);


        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $product)
    {
         $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}

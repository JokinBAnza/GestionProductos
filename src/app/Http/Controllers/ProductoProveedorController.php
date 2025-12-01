<?php

namespace App\Http\Controllers;

use App\Models\ProductoProveedor;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Usuario;

class ProductoProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Usuario = Usuario::find(1);
         $asignaciones = ProductoProveedor::with(['producto', 'proveedor'])->get();
        return view('producto_proveedors.index', compact('asignaciones','Usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $productos = Producto::all();
        $proveedors = Proveedor::all();
        return view('producto_proveedors.create', compact('productos', 'proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);

        ProductoProveedor::create($request->only('producto_id', 'proveedor_id'));

        return redirect()->route('producto_proveedors.index')->with('success', 'Relación creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoProveedor $productoProveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoProveedor $productoProveedor)
    {
          $productos = Producto::all();
        $proveedors = Proveedor::all();
        return view('producto_proveedors.edit', compact('productoProveedor', 'productos', 'proveedors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoProveedor $productoProveedor)
    {
         $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);

        $productoProveedor->update($request->only('producto_id', 'proveedor_id'));

        return redirect()->route('producto_proveedors.index')->with('success', 'Relación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoProveedor $productoProveedor)
    {
        $productoProveedor->delete();
        return redirect()->route('producto_proveedors.index')->with('success', 'Relación borrada correctamente.');
    }
}

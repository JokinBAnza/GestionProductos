<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Usuario = Usuario::find(1);
        // Cargar proveedores con sus productos
        $proveedors = Proveedor::with('productos')->get();
        return view('proveedors.index', compact('proveedors','Usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $productos = \App\Models\Producto::all(); // Trae todos los productos
        return view('proveedors.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'nombre' => 'required|string|max:255',
        'productos' => 'nullable|array',
        'productos.*' => 'exists:productos,id',
    ]);

    // Crear el proveedor
    $proveedor = Proveedor::create([
        'nombre' => $request->nombre,
    ]);

    // Asignar productos seleccionados a la tabla pivote
    if ($request->productos) {
        $proveedor->productos()->sync($request->productos);
    }

    return redirect()->route('proveedors.index')->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        $productos = Producto::all(); // Para seleccionar productos si quieres asociarlos
        $proveedor->load('productos');
        return view('proveedors.edit', compact('proveedor', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'productos' => 'array', // IDs de productos seleccionados
            'productos.*' => 'exists:productos,id',
        ]);

        $proveedor->update([
            'nombre' => $request->nombre,
        ]);

        // Actualizar productos asociados
        if ($request->has('productos')) {
            $proveedor->productos()->sync($request->productos);
        }

        return redirect()->route('proveedors.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
         try {
        $proveedor->delete();
    } catch (\Illuminate\Database\QueryException $e) {
        return back()->withErrors('No puedes borrar este proveedor porque tiene productos asignados.');
    }

    return redirect()->route('proveedors.index');
    }
}

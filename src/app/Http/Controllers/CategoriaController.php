<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Usuario;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    protected $usuario;
     public function __construct()
    {
        // Esto se ejecuta para todos los métodos del controlador
        $this->usuario = Usuario::find(1);
        view()->share('usuario', $this->usuario);
    }
    public function index()
    {
        $categories = Categoria::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $category): View
    {
         // $category se inyecta y carga automáticamente.
        return view('categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $category)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $category)
    {
         try {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Categoría eliminada correctamente.');
    } catch (QueryException $e) {
        // Código 23000 = violación de clave foránea
        if ($e->getCode() === '23000') {
            return redirect()->route('categories.index')
                             ->with('error', 'No se puede borrar esta categoría porque contiene productos.');
        }

        // Si es otro error, lo lanzamos
        throw $e;
    }
    }
}

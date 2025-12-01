<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Usuario;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Usuario = Usuario::find(1);
        $Perfil = $Usuario->perfil;

        return view('perfil.index', compact('Usuario', 'Perfil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}

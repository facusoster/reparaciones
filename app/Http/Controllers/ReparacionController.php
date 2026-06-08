<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reparaciones = Reparacion::all();
        return view('reparaciones.index', compact('reparaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reparaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cliente' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion_falla' => 'required',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required',
        ]);

        Reparacion::create($request->all());
        return redirect()->route('reparaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $reparacion = Reparacion::findOrFail($id);
        return view('reparaciones.show', compact('reparacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reparacion = Reparacion::findOrFail($id);
        return view('reparaciones.edit', compact('reparacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cliente' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'descripcion_falla' => 'required',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required',
        ]);

        $reparacion = Reparacion::findOrFail($id);
        $reparacion->update($request->all());
        return redirect()->route('reparaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reparacion = Reparacion::findOrFail($id);
        $reparacion->delete();
        return redirect()->route('reparaciones.index');
    }
}

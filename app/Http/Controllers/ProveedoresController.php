<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Models\Medidas;

class ProveedoresController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedores::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedores();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->nombre_contacto = $request->input('nombre_contacto');

        $proveedor->save();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->nombre_contacto = $request->input('nombre_contacto');

        $proveedor->save();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        if ($proveedor) {
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
        } else {
            return redirect()->route('proveedores.index')->with('error', 'Proveedor no encontrado.');
        }
    }


}

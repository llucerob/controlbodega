<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medida;

class MedidasController extends Controller
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
        $medidas = Medida::all();
        return view('medidas.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('medidas.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newMedida = new Medida();
        $newMedida->nombre = $request->nombre;
        $newMedida->abreviatura = $request->abreviatura;
        $newMedida->save();
        
        return redirect()->route('medidas.index')->with('success', 'Medida creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //por hacer, aun no se si es necesario
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //lo mismo que edit
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medida = Medida::find($id);
        if ($medida) {
            $medida->delete();
            return redirect()->route('medidas.index')->with('success', 'Medida eliminada correctamente');
        } else {
            return redirect()->route('medidas.index')->with('error', 'Medida no encontrada');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medida;
use Flasher\Laravel\Facade\Flasher;

class MedidasController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medidas = Medida::all();
        return view('medidas.listar', compact('medidas'));
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
        $newMedida->abreviatura = $request->abreviacion;
        $newMedida->save();
        Flasher::addSuccess('Medida creada correctamente');
        return redirect()->route('medidas.index');
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
            Flasher::addSuccess('Medida eliminada correctamente');
            return redirect()->route('medidas.index');
        } else {
            Flasher::addError('Medida no encontrada');
            return redirect()->route('medidas.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Medida;
use App\Models\Proveedor;

class MaterialesController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.index', compact('materiales'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medidas = Medida::all();
        return view('materiales.create', compact('medidas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newMaterial                    = new Material();
        $newMaterial->nombre            = $request->input('nombre');
        $newMaterial->valor_unitario    = $request->input('valor_unitario');

        if($request->input('marca') == '') {
            $newMaterial->marca = 'No especificada';
        } else {
            $newMaterial->marca = $request->input('marca');
        }
        $newMaterial->cantidad          = 0;
        
        $newMaterial->medida            = $request->input('medida');
        $newMaterial->min_stock         = $request->input('min_stock');
        $newMaterial->save();
        return redirect()->route('materiales.index')->with('success', 'Material creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::findOrFail($id);
        $medidas = Medida::all();
        return view('materiales.edit', compact('material', 'medidas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::findOrFail($id);
        $material->nombre            = $request->input('nombre');
        $material->valor_unitario    = $request->input('valor_unitario');
        $material->cantidad         = $request->input('cantidad');
        $material->min_stock        = $request->input('min_stock');
        $material->medida           = $request->input('medida');
        $material->update();
        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado correctamente');
    }

    public function vistacompra($id)
    {
        $material = Material::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('materiales.vistacompra', compact('material', 'proveedores'));
    }
    public function listarcompras($id)
    {
        $material = Material::findOrFail($id);
        $compras = $material->compras()->get();
        return view('materiales.listarcompras', compact('material', 'compras'));
    }
    public function agregarcompra(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->compras()->attach($request->input('proveedor'), [ 
            'cantidad' => $request->input('cantidad'),
            'valor_unitario' => $request->input('valor_unitario'),
            'fecha' => $request->input('fecha'),
            'factura' => $request->input('factura'),
        ]);
        return redirect()->route('materiales.index')->with('success', 'Compra agregada correctamente');
    }


}

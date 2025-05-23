<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Medidas;
use Flasher\Laravel\Facade\Flasher;



class ProveedoresController extends Controller
{
   
   
   
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.listar', compact('proveedores'));
    }

    public function ajaxproveedores(){


        $prov = Proveedor::all();
        $arr = [];

        foreach($prov  as $key => $b ){
            $arr[$key]['id']                  = $b->id;
            $arr[$key]['nombre']              = $b->nombre;
            $arr[$key]['direccion']           = $b->direccion;
            $arr[$key]['nombre_contacto']     = $b->nombre_contacto;
            $arr[$key]['telefono']            = $b->telefono;
            $arr[$key]['mail']                = $b->email;
               
        }

        

           //dd($arr);
        
        return DataTables($arr)->tojson();


        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('proveedores.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('mail');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->nombre_contacto = $request->input('contacto');

        $proveedor->save();
        Flasher::addSuccess('Proveedor creado correctamente');
        return redirect()->route('proveedores.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->nombre_contacto = $request->input('nombre_contacto');

        $proveedor->save();
        Flasher::addSuccess('Proveedor actualizado correctamente');
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        if ($proveedor) {
            $proveedor->delete();
            Flasher::addSuccess('Proveedor eliminado correctamente');
            return redirect()->route('proveedores.index');
        } else {
            Flasher::addError('Proveedor no ha sido eliminado');
            return redirect()->route('proveedores.index');
        }
    }


}

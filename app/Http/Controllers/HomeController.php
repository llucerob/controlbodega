<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Actividad;
use App\Models\Proveedor;


class HomeController extends Controller
{

   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        
        
        if(auth()->user()->hasRole('admin')) {

            

            $actividad = [];
            $actividad['proveedores']   = (int)Proveedor::count();
            $actividad['en_proceso']    = Actividad::where('estado', 'en proceso')->count();
            $actividad['por_valorizar'] = Actividad::where('estado', 'terminado')->count();
            $actividad['valorizada']    = Actividad::where('estado', 'valorizado')->count();

            //dd($actividad);


            return view('dashboard.admin', compact('actividad'));
        } elseif(auth()->user()->hasRole('supervisor')) {
            return view('dashboard.supervisor');
        } elseif(auth()->user()->hasRole('bodega')) {
            return view('dashboard.bodega');
        } elseif(auth()->user()->hasRole('secretaria')) {
            return view('dashboard.secretaria');
        } else {
            return view('home');
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

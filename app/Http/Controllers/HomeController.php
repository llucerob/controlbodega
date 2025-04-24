<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Actividad;
use App\Models\Proveedor;
use App\Models\Ocupado;

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
            
            $actividad = [];
            $actividad['en_proceso']    = Actividad::where('estado', 'en proceso')->count();
            $actividad['por_valorizar'] = Actividad::where('estado', 'terminado')->count();
            $actividad['valorizada']    = Actividad::where('estado', 'valorizado')->count();
            return view('dashboard.supervisor', compact('actividad'));

        } elseif(auth()->user()->hasRole('bodega')) {
            
            $bodega = [];
            $bodega['materiales']       = Material::where('cantidad', '>', 0)->count();
            $reservados                 = Actividad::with('reservados')->get();
            $bodega['reservados']       = 0;

            

            foreach ($reservados as $reserva) {
                if($reserva->reservados->count() >0){

                    $bodega['reservados'] = $bodega['reservados'] + $reserva->reservados->count();
                }	

              
            }
            //dd($bodega);
            /*
            $pordevolver                 = Actividad::with('ocupados')->get();
            $bodega['pordevolver']       = 0;
            foreach ($pordevolver as $p) {
                if($reserva->ocupados->count() >0){
                    foreach ($p->ocupados as $ocupa) {
                        $bodega['pordevolver'] = $bodega['pordevolver'] + $ocupa->ocupados->por_devolver;
                    }
                
                }
            }*/
            $bodega['pordevolver']                 = Ocupado::where('por_devolver','>',0)->count();
            
         
                  
            
            return view('dashboard.bodega', compact('bodega'));

           
        } elseif(auth()->user()->hasRole('secretaria')) {

            $actividad = [];
            $actividad['proveedores']   = (int)Proveedor::count();
            $actividad['en_proceso']    = Actividad::where('estado', 'en proceso')->count();
            $actividad['por_valorizar'] = Actividad::where('estado', 'terminado')->count();
            $actividad['valorizada']    = Actividad::where('estado', 'valorizado')->count();
            return view('dashboard.secretaria', compact('actividad'));
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

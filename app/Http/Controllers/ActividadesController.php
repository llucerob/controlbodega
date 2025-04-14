<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Material;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::where('estado', 'en proceso')->get();

        //dd($actividades);
        

        return view('actividades.listar', compact('actividades'));
    }

    public function ajaxactividades(){
        
        $act = Actividad::all();
        $arr = [];
        foreach($act as $key => $a){
            $arr[$key]['id'] = $a->id;
            if($a->emergencia == 'si'){
                $arr[$key]['emergencia'] = 'Es Emergencia';
            }else{
                $arr[$key]['emergencia'] = 'No es emergencia';
            }
            if($a->ticket == 'null'){
                $arr[$key]['ticket'] = 'No presenta Ticket';
            }else{
                $arr[$key]['ticket'] = $a->ticket;
            }
            
            
            $arr[$key]['nombre'] = $a->nombre;
            $arr[$key]['ubicacion'] = $a->ubicacion;
            $arr[$key]['inicio'] = $a->inicio;
            $arr[$key]['estado'] = $a->estado;
            
        }
        
     
        
         
        
        return DataTables($arr)->tojson();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$materiales = Material::all();

        $materiales = Material::all();

        $lista = [];
        foreach($materiales as $key => $m){

            if($m->cantidad > 0)
            {
                $lista[$key]['id'] = $m->id;
                $lista[$key]['text'] = $m->nombre.'    '.$m->cantidad.' '.' ['.$m->esmedida->abreviatura.'] Disponible';
            }

            
        }

        return view('actividades.create', compact('lista'));
    }

    public function create2(Request $request)
    {
         //dd($request->materiales);
      
       

        //dd($material);
        $actividad = $request->actividad;

        
        if(isset($actividad['interna'])){

            $actividad['interna'] = 'si';

        }else{
            $actividad['interna'] = 'no';
        }

        
        
        
        

        $arr_material = [];

        foreach($request->materiales as $key => $m)
        {
            $a = Material::findOrfail($m);
            $arr_material[$key]['id'] = $a->id;
            $arr_material[$key]['nombre'] = $a->nombre;
            $arr_material[$key]['cantidad'] = $a->cantidad;
            $arr_material[$key]['medida'] = $a->esmedida->abreviatura;
            }

        
        //dd($ocupados);

       
        
     

        return view('actividades.create2', compact('arr_material', 'actividad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actividad = $request->actividad;
        $ocupados = $request->material;

        
        $new_actividad = New Actividad;


     

        $new_actividad->nombre = $actividad['nombre'];
       

        if(isset($actividad['ticket'])){
            $new_actividad->ticket = $actividad['ticket'];
            $new_actividad->emergencia = 'no';
        }else{

            $new_actividad->emergencia = 'si';
            $new_actividad->ticket=null;
            
        }


        if($actividad['interna'] == 'si'){
            $new_actividad->interna = 'si'; 
            $new_actividad->emergencia = 'no';
            $new_actividad->ticket = null;
        }
        $new_actividad->ubicacion = $actividad['ubicacion'];
        $new_actividad->inicio = Carbon::parse($actividad['inicio'])->format('Y-m-d');
        $new_actividad->estado = 'en proceso';
       



        $new_actividad->save();

        

foreach($ocupados as $p){
            $material = Material::find($p['id']);
            
            $new_actividad->reservados()->attach($p['id'], ['cantidad'=>$p['cantidad'], 'valor'=>$material->valor_unitario, 'medida_id'=>$material->esmedida->id]);
            
            $material->cantidad = $material->cantidad - $p['cantidad'];

            $material->update();

        }


        return redirect('dashboard')->with('success', 'se ha creado una nueva actividad');

    }


    public function cerraractividad(Request $request){

        $actividad = Actividad::findOrFail($request->id);


         //dd($actividad->ocupados);

        //$nombre = "archivo-del".$actividad->nombre;

        if($request->file('doc')){

            $ruta = Storage::disk('public')->put('archivos', $request->file('doc'));


            $actividad->archivo = $ruta;
        }

        



        $actividad->activo ='0';
        $actividad->termino = date('d/m/Y');
        $actividad->update();

        //luego de cerrar la actividad, si hay elementos por devolver se envia a la devolucion

        if(isset($request->devolucion)){

            


           
            return redirect('devolucion-material/'.$actividad->id);
        }else{

            return redirect('listar-actividades')->with('success', 'se ha cerrado la actividad correctamente');

        };


        


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
          $actividad = Actividad::findOrFail($id);

        


        return view('actividades.editar', ['actividad' => $actividad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actividad = Actividad::findOrFail($id);

        $update = $request->actividad;
 
        $actividad->nombre       = $update['nombre'];
        $actividad->ubicacion    = $update['ubicacion'];
        $actividad->inicio       = $update['inicio'];
 
      
        
        if(isset($update['interna'])){
         $actividad->interna = '1';
         $actividad->emergencia = '0';
         $actividad->ticket = "null";
 
         }elseif(isset($update['tick'])){
 
             $actividad->emergencia  = '0';
             $actividad->ticket      = $update['ticket'];
             $actividad->interna     = "0";           
 
         }else{
 
             $actividad->ticket = "null";
             $actividad->emergencia = "1";
             $actividad->interna = "0";
 
            
         
         }
     
 
 
       
 
 
 
         $actividad->update();
 
 
         return redirect('listar-actividades')->with('success', 'Se ha actualizado el registro');
    }

   
}

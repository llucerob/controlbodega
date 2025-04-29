<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Material;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Trabajo;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$actividades = Actividad::where('estado', 'en proceso')->get();

        //dd($actividades);
        

        return view('actividades.listar');
    }

    public function enproceso()
    {
        //$actividades = Actividad::where('estado', 'en proceso')->get();

        //dd($actividades);
        

        return view('actividades.enproceso');
    }

    public function ajaxactividades(){
        
        $act = Actividad::all();
        $arr = [];
        foreach($act as $key => $a){
            $arr[$key]['id'] = $a->id;

            if($a->emergencia == 'si'){
                $arr[$key]['tipo'] = 'Emergencia';
            }elseif($a->interna == 'si'){
                $arr[$key]['tipo'] = 'Interna';
                
            }else{
                $arr[$key]['tipo'] = 'Ticket';
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

    public function ajaxenproceso(){
        
        $act = Actividad::where('estado', 'en proceso')->get();
        $arr = [];
        foreach($act as $key => $a){
            $arr[$key]['id'] = $a->id;

            if($a->emergencia == 'si'){
                $arr[$key]['tipo'] = 'Emergencia';
            }elseif($a->interna == 'si'){
                $arr[$key]['tipo'] = 'Interna';
                
            }else{
                $arr[$key]['tipo'] = 'Ticket';
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
       

        if($actividad['interna'] == 'si'){

            $new_actividad->actividad_interna = 'si'; 
            $new_actividad->emergencia = 'no';
            $new_actividad->ticket = null;

        }elseif(isset($actividad['ticket'])){

            $new_actividad->ticket = $actividad['ticket'];
            $new_actividad->emergencia = 'no';
            $new_actividad->actividad_interna = 'no';

        }else{

            $new_actividad->emergencia = 'si';
            $new_actividad->ticket=null;
            $new_actividad->actividad_interna = 'no';
            
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


    



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actividad = Actividad::findOrFail($id);
        $inicio = Carbon::parse($actividad->inicio)->format('Y-m-d');

        if($actividad->estado == 'terminado' || $actividad->estado == 'valorizado'){
            $fin = Carbon::parse($actividad->fin)->format('Y-m-d');

            //$dias = $inicio->diff($fin, true)->days;
            
            $dias = Carbon::parse($inicio)->diffInDays(Carbon::parse($fin));


        }else{
                 
            $dias = Carbon::parse($inicio)->diffInDays(Carbon::now());
        }
        

        $dias = (int)$dias;
        //dd((int)$dias);

        //$materiales = $actividad->reservados;

        //dd($materiales);

        return view('actividades.ver', compact('actividad', 'dias'));
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

        
 
        $actividad->nombre       = $request->input('nombre');
        $actividad->ubicacion    = $request->input('ubicacion');
        $actividad->inicio       = $request->input('inicio');
 
      
        
        if($request->input('interna') == 'on'){
         $actividad->actividad_interna = 'si';
         $actividad->emergencia = 'no';
         $actividad->ticket = null;
 
         }elseif($request->input('tik') == 'on'){
 
             $actividad->emergencia  = 'no';
             $actividad->ticket      = $request->input('ticket');
             $actividad->actividad_interna     = 'no';           
 
         }else{
 
             $actividad->ticket = null;
             $actividad->emergencia ='si';
             $actividad->actividad_interna = 'no';
 
            
         
         }
     
 
         $actividad->update();
 
 
         return redirect('listar-actividades')->with('success', 'Se ha actualizado el registro');
    }

    public function cerrar(Request $request){
        
        $actividad = Actividad::findOrFail($request->input('actividad_id'));

        $cantidad = 0;
        
        foreach($actividad->ocupados as $m){

            $cantidad = $cantidad + $m->ocupados->por_devolver;

        }

        foreach($actividad->reservados as $m){

            $cantidad = $cantidad + $m->reservados->cantidad;

        }
        
        if($request->input('devolucion') == 'on')
        {
            return redirect('devolucion-material/'.$request->input('actividad_id'));

        }elseif($cantidad > 0)
        {
            flash()->info('No se puede cerrar la actividad, Hay materiales por recibir o devolver para esta actividad');
            return redirect()->route('actividades.index', $actividad->id);
        }elseif($actividad->estado != 'en proceso')
        {
            flash()->info('La actividad ya se encuentra cerrada');
            return redirect()->route('actividades.index', $actividad->id);
        }else
        {

   
           if($request->file('doc')){
   
               $ruta = Storage::disk('public')->put('archivos', $request->file('doc'));
   
               $actividad->archivo = $ruta;
           }
           
            $actividad->estado = 'terminado';  
   
           $actividad->fin = Carbon::now()->format('Y-m-d');
           $actividad->update();
   
           //luego de cerrar la actividad, si hay elementos por devolver se envia a la devolucion
   
           
   
               return redirect('listar-actividades')->with('success', 'se ha cerrado la actividad correctamente');
   
           
        }
        
        
       
    }

    public function trabajosrealizados(){

        $actividades = Actividad::where('estado', 'terminado')->get();

        //dd($actividades);

        return view('actividades.cerradas', compact('actividades'));
    }

    public function valorizar($id){
        $actividad = Actividad::findOrFail($id);

        //$materiales = $actividad->reservados;

        //dd($materiales);

        return view('actividades.valorizar', compact('actividad'));


    }

    public function setcotizar(Request $request, $id){
        $actividad = Actividad::findOrFail($id);

        $actividad->cotizacion = $request->input('cotizacion');

        $actividad->estado = 'valorizado';
        $actividad->valorizado = 'si';
        $actividad->update();

        return redirect()->route('actividades.trabajosrealizados')->with('success', 'Se ha agregado cotizacion a la actividad');

   
    }

    public function historialvalorizacion(){
        $actividades = Actividad::where('estado', 'valorizado')->get();

       

        //dd($historial);

        return view('actividades.historial', compact('actividades'));

    }

    public function activar($id){
        $actividad = Actividad::findOrFail($id);

        $actividad->estado = 'en proceso';
        $actividad->update();

        return redirect()->route('actividades.index')->with('success', 'Se ha reactivado la actividad');

    }
    public function agregartrabajo(Request $request, $id){
       
        $trabajo = new Trabajo;
        $trabajo->detalle = $request->input('detalle');
        $trabajo->cantidad = $request->input('cantidad');
        $trabajo->valor = $request->input('valor');
        $trabajo->actividad_id = $id;
        $trabajo->save();

       

        return redirect()->route('actividades.valorizar', $id)->with('success', 'Se ha agregado un nuevo trabajo a la actividad');

    }
}

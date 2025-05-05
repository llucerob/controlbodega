<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Medida;
use App\Models\Proveedor;
use Carbon\Carbon;
use App\Models\Compra;
use App\Models\Actividad;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Ocupado;
use Flasher\Laravel\Facade\Flasher;


class MaterialesController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.listar', compact('materiales'));

    }
    public function ajaxmateriales(Request $request)
    {
        $materiales = Material::all();
        $arr = [];
        foreach ($materiales as $material) {
            $arr[] = [
                'id' => $material->id,
                'nombre' => $material->nombre,
                'marca' => $material->marca,
                'valor_unitario' => '$ '.$material->valor_unitario,
                'cantidad' => $material->cantidad.' ['.$material->esmedida->abreviatura.']',
                'min_stock' => $material->min_stock,
                'valorcantidad' => $material->cantidad,                
            ];
        }

        //dd($arr);
        return DataTables($arr)->tojson();
        ;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medidas = Medida::all();
        return view('materiales.crear', compact('medidas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newMaterial                    = new Material();
        $newMaterial->nombre            = $request->input('nombre');
        $newMaterial->valor_unitario    = 0;

        if($request->input('marca') == '') {
            $newMaterial->marca = 'No especificada';
        } else {
            $newMaterial->marca = $request->input('marca');
        }

        $newMaterial->cantidad          = 0;
        
        $newMaterial->medida            = $request->input('medida');
        $newMaterial->min_stock         = $request->input('stock');
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
        
        $material->marca            = $request->input('marca');
        $material->min_stock        = $request->input('stock');
        
        $material->update();
        Flasher::addSuccess('Material actualizado correctamente');
        return redirect()->route('materiales.index');
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
        return view('materiales.compra', compact('material', 'proveedores'));
    }


    public function listarcompras($id)
    {
        $material = Material::findOrFail($id);
        $compras = $material->compras()->get();
        return view('materiales.listar_compras', compact('material', 'compras'));
    }

    public function ajaxcomprasmaterial($id)
    {
        $material = Material::findOrFail($id);
        $compras = $material->compras()->get();
        $arr = [];
        foreach ($compras as $compra) {

            if($compra->compras->fecha_compra != null){
            //dd($compra->compras);
                $arr[] = [
                    'proveedor' => $compra->nombre,
                    'valor_unitario' => '$ '.$compra->compras->valor_unitario,
                    'cantidad' => $compra->compras->cantidad.' ['.$material->esmedida->abreviatura.']',
                    'fecha_compra' => Carbon::parse($compra->compras->fecha_compra)->format('Y-m-d'),             
                    'factura' => $compra->compras->factura,
                    ];
            }else{
                $arr[] = [
                    'proveedor' => $compra->nombre,
                    'valor_unitario' => '$ '.$compra->compras->valor_unitario,
                    'cantidad' => $compra->compras->cantidad.' ['.$material->esmedida->abreviatura.']',
                    'fecha_compra' => 'No especificada',       
                    'factura' => $compra->compras->factura,
                    ];
                
            }
        }

        return DataTables($arr)->tojson();
    }
    

    public function agregarcompra(Request $request, $id)
    {
        $idMaterial     = $id;
        $idProveedor    = $request->input('proveedor_id');
        $factura        = $request->input('factura');

        
        $cantidad       = $request->input('cantidad');

        $iva = $request->input('iva');  

        //dd($iva);
       if(isset($iva)){
            $valor_unitario = (int)($request->input('valor_unitario') * 1.19);
        }else{
            $valor_unitario = $request->input('valor_unitario');
        }
        
        
        $fecha_compra   = Carbon::parse($request->input('fecha_compra'))->format('Y-m-d'); 
        
        //dd($idProveedor);

        //registramos la nueva compra
        $material = Material::findOrFail($idMaterial);
       

        $material->compras()->attach($idProveedor, [
            'cantidad'          =>$cantidad, 
            'valor_unitario'    =>$valor_unitario, 
            'fecha_compra'      =>$fecha_compra, 
            'factura'           =>$factura,
            'medida_id'         =>$material->esmedida->id,
        ]);

        
        $valores= [];


    foreach( $material->compras as $key => $p){

        $valores[$key] = $p->compras->valor_unitario;

    }

        
        $material->valor_unitario = max($valores);

        $material->cantidad = $material->cantidad + $cantidad;

        $material->update();

        return redirect()->route('materiales.index')->with('success', 'Compra registrada correctamente');
    }


    public function consultacompras()
    {
        $proveedores = Proveedor::all();
        return view('materiales.consulta_compras', compact('proveedores'));
    }


    public function consultarcomprafecha(Request $request){

        
        

        $desde = Carbon::parse($request->desde)->format('Y-m-d');
        $hasta = Carbon::parse($request->hasta)->format('Y-m-d');


        //dd($hasta);
       
        $proveedor = $request->proveedor;


    

        $compras = Compra::where('proveedor_id', '=', $proveedor)
                            ->wherebetween('fecha_compra', [$desde, $hasta])
                            ->get();
                        

        $nombreproveedor = Proveedor::findOrFail($proveedor);
        
        $arreglo = [];

        foreach($compras as $key => $c){

            $arreglo[$key]['nombre']    = $c->material->nombre;
            $arreglo[$key]['cantidad']  = $c->cantidad;
            $arreglo[$key]['valor']     = $c->valor_unitario;
            $arreglo[$key]['total']     = $c->valor_unitario * $c->cantidad;
            $arreglo[$key]['factura']   = $c->factura;
            $arreglo[$key]['fecha']     = $c->fecha_compra;
        }
        


        
        
    
       

    return view('materiales.resultado_compras', compact('arreglo', 'nombreproveedor', 'desde', 'hasta'));

    }

    public function reservados()
    {
        $actividades = Actividad::with('reservados')->where('estado', 'en proceso')->get();
        //dd($actividades);
        $arr = [];

        foreach($actividades as $key =>$a)
        {
            //dd($a->reservados->count());
            if($a->reservados->count()>0)
            {
                $arr[$key]['actividad_nombre'] = $a->nombre;
                $arr[$key]['actividad_id'] = $a->id;

                //$mat= [];
                
                foreach($a->reservados as $key2 => $r)
                {   
                    //dd($r->nombre);
                    //$material = Material::findOrFail($r->reservados->material_id);

                    //dd($material);
                    $arr[$key]['material'][$key2]['material_id'] = $r->id;
                    $arr[$key]['material'][$key2]['material_nombre'] = $r->nombre;
                    $arr[$key]['material'][$key2]['material_cantidad'] = $r->reservados->cantidad;
                    $arr[$key]['material'][$key2]['material_valor'] = $r->reservados->valor;

                   
                    $arr[$key]['material'][$key2]['material_medida'] = $r->esmedida->abreviatura;
                    //$arr[$key]['material'][$key2]['medida_id'] = $material->esmedida->id;
                }
                
                $arr[$key]['ubicacion'] = $a->ubicacion;
                $arr[$key]['fecha'] = Carbon::parse($a->inicio)->format('Y-m-d');
                
            }
        }

        
        //dd($arr);
        return view('materiales.reservados', compact('arr'));
    }

    public function reservadosentrega($id){

        $actividad = Actividad::findOrFail($id);
        $materiales = $actividad->reservados()->get();
        //dd($materiales);
        $arr = [];

        foreach($materiales as $key => $m)
        {
            //dd($m->reservados->id);
            $actividad->ocupados()->attach($m->reservados->material_id, [
                'cantidad' => $m->reservados->cantidad,
                'valor' => $m->reservados->valor,
                'medida_id' => $m->reservados->medida_id,
            ]);
            
        }
        $actividad->reservados()->detach($materiales);
        //dd($actividad->reservados);
        return redirect()->route('materiales.reservados')->with('success', 'Material entregado correctamente');

    }

    public function reservar($id)
    {
        $materiales = Material::all();
        $actividad = Actividad::findOrFail($id);
        $lista= [];
        foreach($materiales as $key => $m)
        {
            if($m->cantidad > 0)
            {
                $lista[$key]['id'] = $m->id;
                $lista[$key]['nombre'] = $m->nombre;
                                
                $lista[$key]['cantidad'] = $m->cantidad.' ['.$m->esmedida->abreviatura.']';
                             
            }
        }
        return view('materiales.reservar', compact('lista', 'actividad'));
    }

    public function reservar2($id, Request $request)
    {

        

        $actividad = Actividad::findOrFail($id);


        $materiales = [];

        foreach($request->materiales as $key => $m)
        {
            $materiales[$key] = Material::findOrFail($m);
        }

        return view('materiales.reservar2', compact('materiales', 'actividad'));
      
    }

    public function setreservar($id, Request $request)
    {

        $actividad = Actividad::findOrFail($id);

        //dd($actividad);

        $ocupados = $request->material;


       foreach($ocupados as $p){
                $material = Material::find($p['id']);

                
    
                $actividad->reservados()->attach($p['id'], [
                    'cantidad' => $p['cantidad'],
                    'valor' => $material->valor_unitario,
                    'medida_id' => $material->medida,
                ]);
    
                $material->cantidad = $material->cantidad - $p['cantidad'];
    
                $material->update();
            }
        
               

        return redirect()->route('actividades.index')->with('success', 'Material reservado correctamente');
    }

    public function consultamaterial($id){

        $material = Material::findOrFail($id);
        //dd($material->ocupados);


        $array = [];
        $total = 0;
        $totalpordevolver =0;

        foreach($material->ocupados as $key => $o){
            //dd($o->ubicacion);
            
            $array[$key]['nombre']      = $o->nombre;
            $array[$key]['ubicacion']   = $o->ubicacion;
            $array[$key]['fecha']       = Carbon::parse($o->ocupados->created_at)->format('Y-m-d');
            $array[$key]['cantidad']    = $o->ocupados->cantidad;
            $array[$key]['por_devolver']       = $o->ocupados->por_devolver;
            $array[$key]['devolucion']       = $o->ocupados->devolucion;
            $total = $total + $o->ocupados->cantidad;
            $totalpordevolver = $totalpordevolver + $o->ocupados->por_devolver;

            


        }

        //dd($array);
        $arr= [];
        $totalreserva = 0;	

        foreach($material->reservados as $key => $r){
            //dd($o->ubicacion);
            
            $arr[$key]['nombre']      = $r->nombre.' (por entregar)';
            $arr[$key]['ubicacion']   = $r->ubicacion;
            $arr[$key]['fecha']       = Carbon::parse($r->reservados->created_at)->format('Y-m-d');
            $arr[$key]['cantidad']    = $r->reservados->cantidad;
            $totalreserva = $totalreserva + $r->reservados->cantidad;

            


        }



        //dd($array);

        $compras = Compra::where('material_id', '=' , $id)->get();

        $arreglo['entradas'] = 0;

        foreach($compras as $c){
            $arreglo['entradas'] = $arreglo['entradas'] + $c->cantidad;
        }

        $arreglo['array']       = $array;
        $arreglo['arr']         = $arr;
        $arreglo['salidas']     = $total;
        $arreglo['reservas']    = $totalreserva;
        $arreglo['pordevolver'] = $totalpordevolver;
        $arreglo['stock']       = $material->cantidad;
        $arreglo['nombre']      = $material->nombre;
        $arreglo['unidad']     = $material->esmedida->abreviatura;


        //dd($arreglo);
        
        view()->share('array', $arreglo);
        $pdf = PDF::loadView('pdfs.rutamaterial', $arreglo);

        return $pdf->download('rutamaterial.pdf');


    }

    public function devolucionmaterial($id){

    
        $actividad = Actividad::findOrFail($id);
        $nombre = $actividad->nombre;

        $ocupados = Ocupado::where('actividad_id', '=', $id)->get();
       
       //dd($ocupados);

        return view('materiales.devolucion', compact('nombre', 'ocupados'));
    }

    public function setdevolucion(Request $request){

        
        
        //dd($request->ocupado);

        foreach($request->input('ocupado') as $key => $o){
            
            $material = Ocupado::findorFail($o['id']);
            $material->por_devolver = $material->por_devolver + $o['cantidad'];
            $material->cantidad = $material->cantidad - $o['cantidad'];
            $material->update();
        }

        return redirect()->route('actividades.index')->with('success', 'Se ha generado devolucion de los materiales correctamente');
    }

    public function recibirdevolucion(){

        $actividades = Actividad::with('ocupados')->where('estado', 'en proceso')->get();
        //dd($actividades);
        $arr = [];

        foreach($actividades as $key =>$a)
        {
            //dd($a->reservados->count());
            if($a->ocupados->count()>0)
            {
                                             
                foreach($a->ocupados as $key2 => $r)
                {   
                    if($r->ocupados->por_devolver > 0 ){
                        $arr[$key]['actividad_nombre'] = $a->nombre;
                        $arr[$key]['actividad_id'] = $a->id;
                        $arr[$key]['ubicacion'] = $a->ubicacion;
                        $arr[$key]['material'][$key2]['material_id'] = $r->id;
                        $arr[$key]['material'][$key2]['material_nombre'] = $r->nombre;
                        $arr[$key]['material'][$key2]['material_cantidad'] = $r->ocupados->por_devolver;
                        $arr[$key]['material'][$key2]['material_valor'] = $r->ocupados->valor;
                 
                        $arr[$key]['material'][$key2]['material_medida'] = $r->esmedida->abreviatura;
                    }
                    
                    
                }
                
                
                
                
            }
        }


        return view('materiales.recibirdevolucion', compact('arr'));

    }

    public function recibedevolucion($id){

        $ocupados = Ocupado::where('actividad_id', $id)->get();

        foreach($ocupados as $o){
            $o->devolucion = $o->por_devolver;
            $o->por_devolver = 0;
            $o->update();

            $bodega = Material::findorFail($o->material_id);
            $bodega->cantidad = $bodega->cantidad + $o->devolucion;
            $bodega->update();

        }


        return redirect()->route('materiales.index')->with('success', 'Se ha realizado una devolucion correctamente a la bodega');

    }



    
}

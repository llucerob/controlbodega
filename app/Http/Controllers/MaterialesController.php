<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Medida;
use App\Models\Proveedor;
use Carbon\Carbon;
use App\Models\Compra;
use App\Models\Actividad;


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
        return view('materiales.compra', compact('material', 'proveedores'));
    }


    public function listarcompras($id)
    {
        $material = Material::findOrFail($id);
        $compras = $material->compras()->get();
        return view('materiales.listarcompras', compact('material', 'compras'));
    }

    public function ajaxcomprasmaterial($id)
    {
        $material = Material::findOrFail($id);
        $compras = $material->compras()->get();
        $arr = [];
        foreach ($compras as $compra) {

            //dd($compra->compras);
            $arr[] = [
                'proveedor' => $compra->nombre,
                'valor_unitario' => '$ '.$compra->compras->valor_unitario,
                'cantidad' => $compra->compras->cantidad.' ['.$material->esmedida->abreviatura.']',
                'fecha_compra' => Carbon::parse($compra->compras->fecha_compra)->format('Y-m-d'),
                'factura' => $compra->compras->factura,
            ];
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
            $valor_unitario = $request->input('valor_unitario') * 1.19;
        }else{
            $valor_unitario = $request->input('valor_unitario');
        }
        
        
        $fecha_compra   = Carbon::createFromFormat('Y-m-d', $request->input('fecha_compra'))->format('Y-m-d'); 
        
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
        return view('materiales.consultaCompras', compact('proveedores'));
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
        


        
        
    
       

    return view('materiales.resultadoCompras', compact('arreglo', 'nombreproveedor', 'desde', 'hasta'));

    }

    public function reservados()
    {
        $actividades = Actividad::all();
        //dd(isset($actividades->reservados));
        $arr = [];

        foreach($actividades as $key =>$a)
        {
            //dd($a->reservados());
            if($a->reservados()->count() > 0 )
            {
                $arr[$key]['actividad_nombre'] = $a->nombre;
                $arr[$key]['actividad_id'] = $a->id;
                //dd($a->reservados);
                foreach($a->reservados as $key2 => $r)
                {   
                    //dd($r->reservados->id);
                    $material = Material::findOrFail($r->reservados->id);

                   
                    //$arr[$key]['material'][$key2]['material_id'] = $r->reservados->id;
                    $arr[$key]['material'][$key2]['material_nombre'] = $material->nombre;
                    $arr[$key]['material'][$key2]['material_cantidad'] = $r->reservados->cantidad;
                    $arr[$key]['material'][$key2]['material_valor'] = $r->reservados->valor;
                    $arr[$key]['material'][$key2]['material_medida'] = $material->esmedida->abreviatura;
                    //$arr[$key]['material'][$key2]['medida_id'] = $material->esmedida->id;
                }
                $arr[$key]['ubicacion'] = $a->ubicacion;
                $arr[$key]['fecha'] = Carbon::parse($a->inicio)->format('Y-m-d');
                
            }
        }

        ;
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

        return view('actividades.agregarMaterialesActividad2', compact('materiales', 'actividad'));
      
    }
}

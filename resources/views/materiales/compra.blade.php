@extends('layout.master')

@section('title', 'RTL')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Materiales</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Compras</li>
                        <li class="breadcrumb-item active">Registrar Compras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid pb-3">
        <div class="row starter-main pb-3">

            <form class="card" action="{{ route('materiales.setcompra', $material->id) }}" method="POST" enctype="multipart/form-data">
                @csrf	
                <div class="card-header">
                    <h4 class="card-title mb-0">Nueva Compra para el Producto " {{$material->nombre}} "</h4>
                    
                    <p>Tenga en cuenta se registrará en la unidad de medida establecida en la bodega para este material,<strong> ( [{{$material->esmedida->nombre}}] )</strong>, si usted compró  en otra unidad debe registrar la compra en la sección compras. </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Proveedor</label>
                                <select required  class="form-control proveedores" name="proveedor_id">
                                    
                                    @foreach ($proveedores as $p)
                                        <option value="{{$p->id }}" >{{$p->nombre}}</option>

                                    @endforeach
                                        
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">N° Factura</label>
                                <input required type="number" min="0" name="factura" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Cantidad</label>
                                <input required type="number" min="0" name="cantidad" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Valor Unitario</label>
                                <input required type="number" min="0" name="valor_unitario" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-3">
                                <label class="form-label">¿Agregar IVA?</label>
                                <div class="">
                                    <label class="switch">
                                    <input type="checkbox" name="iva"><span class="switch-state"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Fecha Compra</label>
                                <input required type="date" name="fecha_compra" class="form-control">
                            </div>
                        </div>


                                                
                        
                        
                        
                        
                    </div>
                </div>
                <div class="card-footer text-right ">
                    <button class="btn btn-primary" type="submit">Registrar Compra</button>
                </div>
            </form>
            
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
@endsection

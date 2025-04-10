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
    <div class="container-fluid">
        <div class="row starter-main">

            <form class="card" action="{{ route('materiales.compra' ) }}" method="POST" enctype="multipart/form-data">
                @csrf	
                <div class="card-header">
                    <h4 class="card-title mb-0">Nueva Compra para el Producto " {{$material->nombre}} "</h4>
                    
                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <input hidden type="text" name=id_material value="{{$material->id}}">

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Proveedor</label>
                                <select required  class="form-control proveedores" name="id_proveedor">
                                    
                                    @foreach ($proveedores as $p)
                                        <option value="{{$p->id }}" >{{$p->nombre}}</option>

                                    @endforeach
                                        
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Cantidad</label>
                                <input required type="text" name="cantidad" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Valor Unitario</label>
                                <input required type="number" name="valor_unitario" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Fecha Compra</label>
                                <input required type="date" name="fecha_compra" class="form-control">
                            </div>
                        </div>


                                                
                        
                        
                        
                        
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Registrar Compra</button>
                </div>
            </form>
            
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

@endsection

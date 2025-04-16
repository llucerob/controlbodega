@extends('layout.master')

@section('title', 'RTL')

@section('css')
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Layout RTL</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Page layout</li>
                        <li class="breadcrumb-item active">RTL</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Todos Los Proveedores</h5>
                    </div>
                    <div class="card-body">
                        <form  action="{{route('proveedores.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf	
                                                                        
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input required class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Dirección</label>
                                            <input required class="form-control" type="text" name="direccion" placeholder="Ingrese Dirección de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Nombre de Contacto</label>
                                            <input required class="form-control" type="text" name="contacto" placeholder="Ingrese nombre del Contacto de su Proveedor">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Teléfono de Contacto</label>
                                            <input   class="form-control" type="text" name="telefono" placeholder="Ingrese Teléfono de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Mail</label>
                                            <input  class="form-control" type="text" name="mail" placeholder="Ingrese Correo electrónico">
                                        </div>
                                    </div>
                                    
                                
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Crear Proveedor</button>
                    </div>
                </form>
            </div>      
            
        </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

@endsection

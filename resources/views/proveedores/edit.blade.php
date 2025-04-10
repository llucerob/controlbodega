@extends('layout.master')

@section('title', 'RTL')

@section('css')
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Proveedores</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Proveedores</li>
                        <li class="breadcrumb-item active">Editar</li>
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
                        <h5>Editar Proveedor</h5>
                    </div>
                    <div class="card-body">
                        <form  action="{{route('proveedores.update', $proveedor->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf	
                                                                        
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input required class="form-control" type="text" value="{{ $proveedor->nombre }}" name="nombre" placeholder="Ingrese nombre de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Dirección</label>
                                            <input required class="form-control" type="text" value="{{ $proveedor->direccion }}" name="direccion" placeholder="Ingrese Dirección de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Nombre de Contacto</label>
                                            <input required class="form-control" type="text" value="{{ $proveedor->nombre_contacto }}" name="contacto" placeholder="Ingrese nombre del Contacto de su Proveedor">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Teléfono de Contacto</label>
                                            <input   class="form-control" type="text" name="telefono" value="{{ $proveedor->telefono }}" placeholder="Ingrese Teléfono de su Proveedor">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Mail</label>
                                            <input  class="form-control" type="text" name="mail" value="{{ $proveedor->email }}" placeholder="Ingrese Correo electrónico">
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
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

@endsection

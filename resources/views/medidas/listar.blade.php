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
                    <h3>Medidas</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Medidas</li>
                        <li class="breadcrumb-item active">Listar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Todos Los Proveedores</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="proveedores" class="table table-bordered  table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Abreviación</th>
                                        <th class="text-center">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medidas as $medida)
                                        <tr>
                                            <td class="text-center">{{$medida->nombre}}</td>
                                            <td class="text-center">{{$medida->abreviatura}}</td>
                                            <td class="text-center">
                                                <a href="{{route('medidas.destroy', $medida->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Todos Los Proveedores</h5>
                </div>
                <div class="card-body">
                    <form class="card" action="{{route('medidas.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        <div class="card-header">
                            <h4 class="card-title mb-0">Nueva Medida</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                
                                <div class="col-sm-6 col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nombre Medida</label>
                                        <input required  class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de  medidas ej: Centimetros">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Abreviación</label>
                                        <input required  class="form-control" type="text" name="abreviacion" placeholder="Ingrese Abreviacion ej: cm">
                                    </div>
                                </div>
                                
    
                                
                                
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Crear Medida</button>
                        </div>
                    </form>
            </div>
        </div>
        
    </div>
        
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

@endsection

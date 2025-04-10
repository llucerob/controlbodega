@extends('layout.master')

@section('title', 'RTL')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
    
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
                        <h5>Todos Las medidas</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="proveedores" class="table table-bordered">
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
                    <h5>Nueva Medida</h5>
                </div>
                <div class="card-body">
                    <form  action="{{route('medidas.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        
                        
                            <div class="row">
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nombre Medida</label>
                                        <input required  class="form-control" type="text" name="nombre" placeholder="ej: Centimetros">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Abreviación</label>
                                        <input required  class="form-control" type="text" name="abreviacion" placeholder="ej: cm">
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
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
    


    <script>
        $(document).ready(function(){

            var tabla = $('#medidas').DataTable({
                language: {
                        url: '//cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
                     },
                       
                        
                                   
                        
                });

           
            
        });

        
       


        


    </script>

@endsection

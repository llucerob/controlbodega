@extends('layout.master')

@section('title', 'RTL')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Actividades</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Actividades</li>
                        <li class="breadcrumb-item">Nueva Reserva</li>
                        <li class="breadcrumb-item active">Paso 2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-lg-12">
                <form class="card" action="{{ route('materiales.setreservar', $actividad->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        
                        <div class="card-header">
                            <h4 class="card-title mb-0">Nueva Salida para {{ $actividad->nombre }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12" >
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad a ocupar</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($materiales as $key => $material)
                                                
                                            <tr>
                                                <td>{{$material['nombre']}}  // {{$material['cantidad']}} [{{ $material->esmedida->abreviatura }}]  Disponibles <input type="text" hidden value={{$material['id']}} name="material[{{$key}}][id]"> </td>
                                                <td><input required min="0" max="{{ $material['cantidad'] }}" type="number"   name="material[{{$key}}][cantidad]" > </td>
                                                
                                                                                        
                                            </tr>
            
                                                
            
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-primary" href="{{ url()->previous()}}" >Atrás</a>
                            <button class="btn btn-primary" type="submit">Nueva salida</button>
                        </div>
                    </form>
                </div>
            
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>

@endsection

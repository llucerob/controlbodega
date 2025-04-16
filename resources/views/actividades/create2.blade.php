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
                        <li class="breadcrumb-item">Nueva</li>
                        <li class="breadcrumb-item active">Paso 2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid m-20">
        <div class="row starter-main p-10">

            <form class="card" action="{{route('actividades.store')}}" method="POST" enctype="multipart/form-data">
                @csrf	
                <div class="card-header">
                <h4 class="card-title mb-0">Actividad de {{$actividad['nombre']}} en {{$actividad['ubicacion']}}</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        
                        <div class="col-sm-6 col-md-8">
                            <div class="form-group mb-3">
                                <label class="form-label">Nombre: 	</label>
                                <label class="form-label">{{$actividad['nombre']}}</label>
                                <input type="text" hidden value="{{$actividad['nombre']}}" name="actividad[nombre]">
                                <input type="text" hidden value="{{$actividad['interna']}}" name="actividad[interna]">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-8">
                            <div class="form-group mb-3">
                                <label class="form-label">Ubicación:	</label>
                                <label class="form-label">{{$actividad['ubicacion']}}</label>
                                <input type="text" hidden value="{{$actividad['ubicacion']}}" name="actividad[ubicacion]">
                            </div>
                        </div>
                        
                        
                        @if($actividad['interna'] == 'si')

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group  mb-3">
                                <label class="form-label">Esta es una actividad interna</label>
                            </div>								
                        </div>
                        
                        
                        @elseif(isset($actividad['ticket']))
                        
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Ticket N°:	</label>
                                    <label class="form-label">{{$actividad['ticket']}}</label>
                                    <input type="text" hidden value="{{$actividad['ticket']}}" name="actividad[ticket]">
                                </div>					
                            </div>

                        @else

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Esta actividad es una emergencia</label>
                                </div>								
                            </div>

                        @endif
                        
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group  mb-3">
                                <label class="form-label">Fecha de Inicio:  </label>
                                <label class="form-label">{{$actividad['inicio']}}</label>
                                <input type="text" hidden value="{{$actividad['inicio']}}" name="actividad[inicio]">
                            </div>				
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group  mb-3">
                                <label class="form-label">Fecha de Término:  </label>
                                <label class="form-label">   NO INDICA    </label>
                            </div>				
                        </div>


                        
                        <div class="col-md-12" >
                            <table class="table table-bordered " id="materiales">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad a ocupar</th>
                                        <th>Medidas</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($arr_material as $key => $material)
                                        
                                    <tr>
                                        <td>{{$material['nombre']}}  // <strong>{{$material['cantidad']}} Disponible</strong>  <input type="text" hidden value={{$material['id']}} name="material[{{$key}}][id]"> <input type="text" hidden value={{$material['nombre']}} name="material[{{$key}}][nombre]"> </td>
                                        <td><input type="number" min="1"  max="{{$material['cantidad']}}" required   name="material[{{$key}}][cantidad]"> </td>
                                        <td>{{$material['medida']}} </td>
                                                                                
                                    </tr>
    
                                        
    
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
                        


                        
                        
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-primary" href="{{ url()->previous()}}" >Atrás</a>
                    <button class="btn btn-primary" type="submit">Crear Actividad</button>
                </div>
            </form>
            
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

<script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.es.js')}}"></script>



<script>
	function cambio()
	{   
    	if(document.getElementById("chec").checked){
			document.getElementById('ticket').readOnly = false;

		}else{
			document.getElementById('ticket').readOnly = true;

		}
        
	}
  </script>
  <script>
		(function($) {

			$('.calendario').datepicker({
				language: 'es',
				autoClose: true,
				position: "top left"
			});
		})(jQuery);
  </script>

@endsection

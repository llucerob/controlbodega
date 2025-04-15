@extends('layout.master')

@section('title', 'RTL')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
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
                        <li class="breadcrumb-item active">nueva</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <form class="card" action="{{ route('actividades.update', $actividad->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf	
                       
                        <div class="card-header">
                            <h4 class="card-title mb-0">Nueva Actividad</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                
                                <div class="col-sm-6 col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input class="form-control" required type="text" name="nombre" value="{{ $actividad->nombre }}" placeholder="Ingrese nombre de Actividad">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Ubicación</label>
                                        <input class="form-control" required  type="text" name="ubicacion" value="{{ $actividad->ubicacion }}" placeholder="Ingrese Ubicación">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 col-md-2">
                                    <div class="form-group  mb-3">
                                        
                                            <label class="form-label">¿Tiene Ticket?</label>
                                            <div class="">
                                                <label class="switch">
                                                <input type="checkbox" onchange="cambio();" id="chec"><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        
                                    </div>				
                                    
                                </div>
                                @if(Auth::user()->hasRole('admin'))
                                <div class="col-sm-6 col-md-2">
                                    <div class="form-group  mb-3">
                                        
                                            <label class="form-label">¿Es Actividad interna?</label>
                                            <div class="">
                                                <label class="switch">
                                                <input type="checkbox" name="actividad[interna]"><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        
                                    </div>				
                                    
                                </div>
                                @endif
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group  mb-3">
                                        <label class="form-label">Ticket</label>
                                        <fieldset>
                                            <div class="input-group mt-1">
                                                <input class="form-control" type="number" min="0" id="ticket" name="actividad[ticket]" readonly>
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
    
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group  mb-3">
                                        <label class="form-label">Fecha de Inicio</label>
                                        <fieldset>
                                            <div class="input-group mt-1">
                                                <input class="calendario form-control" required  type="text" id="date" name="actividad[inicio]">
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
    
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group  mb-3">
                                        <label class="form-label">Seleccione los materiales a necesitar en esta actividad, la cantidad de cada material se le solicitará en la siguiente ventana
                                        </label>
                                        <fieldset>
                                            <div class="input-group mt-1">
                                                <select name="materiales[]" id="materiales" multiple="multiple" style="width: 75%">
                                                    @foreach($lista as  $l)
                                                        <option value="{{$l['id']}}">{{$l['text']}}</option>
                
                                                    @endforeach
                                                </select>							
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
    
                                
                                                
    
    
                                
                                
                                
    
                                
                                
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Crear Actividad</button>
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
  
  <script>
    $(document).ready(function() {

		//var data =  {!! json_encode($lista) !!} ;
	
    	$('#materiales').select2({
			
		});

    });

	
	
</script>

@endsection

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
                                                <input type="checkbox" onchange="cambio();" @if($actividad->emergencia == 'no') checked @endif name="tik" id="chec"><span class="switch-state"></span>
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
                                                <input type="checkbox" @if($actividad->actividad_interna == 'si') checked @endif name="interna"><span class="switch-state"></span>
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
                                                <input class="form-control" type="number" min="0" id="ticket" value="{{ $actividad->ticket }}" name="ticket" readonly>
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
    
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group  mb-3">
                                        <label class="form-label">Fecha de Inicio</label>
                                        <fieldset>
                                            <div class="input-group mt-1">
                                                <input class="calendario form-control" required  type="text" id="date" name="inicio" value="{{ $actividad->inicio }}">
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
    
                              
    
                                
                                                
    
    
                                
                                
                                
    
                                
                                
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Editar</button>
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

		
	
    	$('#materiales').select2({
			
		});

    });

	
	
</script>

@endsection

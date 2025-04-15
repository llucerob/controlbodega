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
                        <li class="breadcrumb-item">Materiales</li>
                        <li class="breadcrumb-item active">Solicitar reserva</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-lg-12">
                <form class="card" action="{{ route('materiales.reservar2', $actividad->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        
                        <div class="card-header">
                            <h4 class="card-title mb-0">Nueva Reserva para {{ $actividad->nombre }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group  mb-3">
                                        <label class="form-label">Seleccione los materiales a necesitar en esta actividad, la cantidad de cada material se le solicitará en la siguiente ventana
                                        </label>
                                        <fieldset>
                                            <div class="input-group mt-1">
                                                <select name="materiales[]" id="materiales" multiple="multiple" style="width: 75%">
                                                    @foreach($lista as  $l)
                                                        <option value="{{$l['id']}}">{{$l['nombre']}} , {{$l['cantidad']}} Disponibles</option>
                
                                                    @endforeach
                                                </select>							
                                            </div>
                                        </fieldset>
                                    </div>				
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Paso 2</button>
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


 
<script>
    $(document).ready(function() {

		//var data =  {!! json_encode($lista) !!} ;
	
    	$('#materiales').select2({
			
		});

    });

	
	
</script>

@endsection

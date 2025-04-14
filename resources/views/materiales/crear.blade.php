@extends('layout.master')

@section('title', 'RTL')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
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
                        <li class="breadcrumb-item">Materiales</li>
                        <li class="breadcrumb-item active">Crear</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid m-10">
        <div class="row starter-main p-20 ">

            <div class="col-md-12 m-10">
                <form class="card" action="{{route('materiales.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        <div class="card-header">
                            <h4 class="card-title mb-0">Nuevo Material</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                
                                
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input required class="form-control" type="text" name="nombre" placeholder="Ingrese nombre de Material">
                                    </div>
                                </div>
    
                                <div class="col-sm-3 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Marca</label>
                                        <input class="form-control" type="text" name="marca" placeholder="Dejar en blanco si se desconce">
                                    </div>
                                </div>
    
    
                                
                                
                                <div class="col-sm-4 col-md-2">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Medida</label>
                                        <select required  class="form-control medidas" name="medida">
                                            
                                            @foreach ($medidas as $medida)
                                                <option value="{{ $medida->id }}" >{{$medida->nombre}} [{{$medida->abreviatura}}]</option>
    
                                            @endforeach
                                                
                                            
                                        </select>
                                    </div>
                                </div>
    
    
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group ">
                                        <label class="form-label">Limite de Stock</label>
                                        <input required class="form-control" type="number" min="0" name="stock"  placeholder="Ingrese Limite Stock">
                                    </div>
                                </div>
                                
                                
                                
                                
    
                                
                                
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Crear Material</button>
                        </div>
                    </form>
                </div>
            
            
            
            
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script>

setTimeout(function(){
        (function($) {
			


			$(".medidas").select2();

	        })(jQuery);
    }
    ,350);
</script>
@endsection

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
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-md-12">
                <form class="card" action="{{route('materiales.update', $material->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf	
                        <div class="card-header">
                            <h4 class="card-title mb-0">Editar Material</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                
                                
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input required class="form-control" type="text" value="{{ $material->nombre }}" name="nombre" placeholder="Ingrese nombre de Material">
                                    </div>
                                </div>
    
                                <div class="col-sm-3 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Marca</label>
                                        <input class="form-control" type="text" value="{{ $material->marca }}" name="marca" placeholder="Dejar en blanco si se desconce">
                                    </div>
                                </div>
    
    
                                
                                
                                <div class="col-sm-4 col-md-2">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Medida</label>
                                        <input class="form-control" disabled type="text" value="{{ $material->esmedida->abreviatura }}" name="medida" placeholder="Dejar en blanco si se desconce">

                                    </div>
                                </div>
    
    
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Limite de Stock</label>
                                        <input required class="form-control" type="number" min="0" value={{ $material->min_stock }} name="stock"  placeholder="Ingrese Limite Stock">
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

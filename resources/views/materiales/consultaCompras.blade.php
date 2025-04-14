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
                    <h3>Compras</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Materiales</li>
                        <li class="breadcrumb-item active">Compras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="row card">

                <div class="card-header">
                    <h4 class="card-title mb-0">Consulta de compras a proveedor</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
        
        

            <form  action="{{route('materiales.consultarcomprafecha')}}" method="POST" enctype="multipart/form-data">
                @csrf
                

                <div class="card-body">
                    <div class="row m-3">
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label class="form-label">Desde</label>
                                <fieldset>
                                    <div class="input-group mt-1">
                                        <input class="calendario form-control"  type="text" id="date" name="desde">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label class="form-label">Hasta</label>
                                <fieldset>
                                    <div class="input-group mt-1">
                                        <input class="calendario form-control"  type="text" id="date" name="hasta">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                            
                            
                    </div>
                    
                    
                    <div class="col-md-10 m-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Nombre Proveedor</label>
                                <select required  class="form-control proveedores" name="proveedor">
                                    
                                    @foreach ($proveedores as $p)
                                        <option value="{{ $p->id }}" >{{$p->nombre}}</option>

                                    @endforeach
                                        
                                    
                                </select>
                            </div>
                    </div>
                    
                </div>
                

                


                

                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Buscar compras</button>
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

setTimeout(function(){
        (function($) {
			


			$(".proveedores").select2();

	        })(jQuery);
    }
    ,350);
</script>

<script>
		(function($) {

			$('.calendario').datepicker({
				language: 'es',
				autoClose: true,
				position: "bottom left",
				dateFormat: "dd-mm-yyyy"
				
			});
		})(jQuery);
  </script>

@endsection

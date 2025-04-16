@extends('layout.master')

@section('title', 'RTL')

@section('css')

    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
    
    
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
                        <li class="breadcrumb-item active">Devolucion Materiales</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-sm-12">
			    <form class="card" action="{{route('materiales.setdevolucion', $actividad->id)}}" method="POST" enctype="multipart/form-data">
					@csrf	
					<div class="card-header">
						<h4 class="card-title mb-0">Devolucion Material</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<table class="table table-bordered" id="actividades">
								<thead>
									<tr>
										<th class="text-center">Nombre</th>
										<th class="text-center">Cantidad Solicitada</th>
										<th class="text-center">Unidad</th>
										<th class="text-center">Cantidad a Devolver</th>
								
										
									</tr>
								</thead>

									@foreach ($actividad->ocupados  as $key => $o)

									<tr>

										<td class="text-center">
											{{ $o->material->nombre }}
										</td>
										<td class="text-center">
											{{ $o->cantidad }}
										</td>
										<td class="text-center">
											{{ $o->esmedida->abreviatura }}
										</td>
										<td class="text-center">
											<input type="text" name="ocupado[{{$key}}][material_id]" value={{$o->id}}  hidden>
											<input type="number" name="ocupado[{{$key}}][devolucion]" min="0" max="{{$o->ocupados->cantidad}}">
										</td>

								    </tr>
									@endforeach
								<tbody>
									
									
									
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer text-right">
						<button class="btn btn-primary" type="submit">Devolver Materiales</button>
					</div>
				</form>
			</div>
            
            
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')

@endsection

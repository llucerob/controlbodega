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

            <div class="col-sm-10">
			    <form class="card" action="{{route('materiales.setdevolucion')}}" method="POST" enctype="multipart/form-data">
					@csrf	
					<div class="card-header">
						<h4 class="card-title mb-0">Devolucion Material para la actividad {{$nombre}}</h4>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<table class="table table-bordered" id="actividades">
								<thead>
									<tr>
										<th class="text-center">Nombre</th>
										<th class="text-center">Cantidad Solicitada</th>
										
										<th class="text-center">Cantidad a Devolver</th>
										<th class="text-center">Cantidad esperando a ser reingresada en bodega</th>
								
										
									</tr>
								</thead>

									@foreach ($ocupados  as $key => $o)

									@if($o->cantidad >0)

									<tr>

										<td class="text-center">
											{{ $o->material->nombre }}
										</td>
										<td class="text-center">
											{{ $o->cantidad }}
										</td>
										
										<td class="text-center">
											<input type="text" name="ocupado[{{$key}}][id]" value="{{$o->id}}"  hidden>
											<input type="number" required name="ocupado[{{$key}}][cantidad]" value="0" min="0" max="{{$o->cantidad}}">
											<strong>[{{ $o->material->esmedida->abreviatura }}]</strong>
										</td>

										<td class="text-center">
											{{ $o->por_devolver }}
											<strong>[{{ $o->material->esmedida->abreviatura }}]</strong>
										</td>

								    </tr>
									@endif
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

@extends('layout.master')

@section('title', 'RTL')

@section('css')

    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/daterange-picker.css')}}">
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
                        <li class="breadcrumb-item active">Cerradas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Valorizar Actividad " {{$actividad->nombre}} " en {{$actividad->ubicacion}} </h5>
                                <h4>del {{$actividad->inicio}} al {{$actividad->fin}}</h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar Trabajo</button>
                            </div>
                        </div>
                                            
                        
                    </div>
                    <div class="card-body">
                    
                    
                        <div class="table-responsive">
                            <table class="display" id="actividades">
                                <thead>
                                    <tr>
                                        
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Cantidad Ocupada</th>
                                        <th class="text-center">Valor Unitario</th>
                                        <th class="text-center">Fecha Ocupada</th>
                                        <th class="text-center">Total</th>
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    
                                    @foreach ($actividad->ocupados  as $a)
    
                                    @if($a->ocupados->cantidad > 0)
                                        <tr>
                                            
                                            <td class="text-left">{{$a->nombre }}</td>
                                            <td class="text-left">{{$a->ocupados->cantidad}}</td>
                                            <td class="text-left">$ {{$a->ocupados->valor}}</td>
                                            <td class="text-left">{{date_format($a->ocupados->created_at, 'Y-m-d')}}</td>
                                            <td class="text-left">$ {{$a->ocupados->cantidad * $a->ocupados->valor}}</td>
                                            
                                        </tr>
                                    @endif
    
                                    @endforeach


                                     @foreach ($actividad->trabajos  as $t)
    
                                    
                                        <tr>
                                            
                                            <td class="text-left">{{$t->detalle }}</td>
                                            <td class="text-left">{{$t->cantidad}}</td>
                                            <td class="text-left">$ {{$t->valor}}</td>
                                            <td class="text-left">{{date_format($t->created_at, 'Y-m-d')}}</td>
                                            <td class="text-left">$ {{$t->cantidad * $t->valor}}</td>
                                            
                                        </tr>
                                   
    
                                    @endforeach

                                     
                                        
                                    
                                    
                                </tbody>
    
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align:right">Total:</th>
                                        <th class="text-center" id="prueba"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card-footer text-right">
    
                        <form action="{{ route('actividades.cotizacion', $actividad->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-form-label">Cotización N°: </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="cotizacion">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Valorizar Actividad</button>
                        </form>
                        
                    </div>

                     <!-- Modal -->
									<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										  <div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" >Ingresara un trabajo anexo a la actividad</h5>
											     

											  	

											</div>
											<form class="card" action="{{ route('actividades.agregartrabajo', $actividad->id)}}" method="POST" enctype="multipart/form-data">
												@csrf	
											<div class="modal-body">

												
												
												<div class="form-group  mb-3">
                                                    <label class="form-label">Nombre Trabajo</label>
                                                    <fieldset>
                                                        <div class="input-group mt-1">
                                                            <input class="form-control" type="text"  name="detalle" required placeholder="Ingrese nombre del Trabajo">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group  mb-3">
                                                    <label class="form-label">Horas o veces</label>
                                                    <fieldset>
                                                        <div class="input-group mt-1">
                                                            <input class="form-control" type="number" min="0" required name="cantidad" placeholder="Ingrese la cantidad de horas o veces" required>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group  mb-3">
                                                    <label class="form-label">Valor Unitario</label>
                                                    <fieldset>
                                                        <div class="input-group mt-1">
                                                            <input class="form-control" type="number" min="0"  name="valor" placeholder="Ingrese valor unitario" required>
                                                        </div>
                                                    </fieldset>
                                                </div>

											
											</div>
																						
											<div class="modal-footer">

												<button type="submit" class="btn btn-primary" >Cerrar Actividad</button>


											
											
											</div>
										</form>
										  </div>
										</div>
									  </div>



                </div>
            </div>
           


        </div>
    </div>
</div>
    <!-- Container-fluid Ends-->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/sum().js') }}"></script>

<script>
    $(document).ready(function() {

        $('#actividades').DataTable({
			drawCallback: function () {
      		var api = this.api();
      		$('#prueba').html("$ " + api.column( 4, {page:'current'} ).data().sum());
		
				},

			
                language: {
                        url: '{{ asset('assets/js/datatable/datatables/es-ES.json') }}',
                     },
                     "lengthMenu": [ [ -1], [ "Todos"] ],
        });

    });


	
</script>

@endsection

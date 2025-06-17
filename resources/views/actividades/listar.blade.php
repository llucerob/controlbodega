@extends('layout.master')

@section('title', 'RTL')

@section('css')

    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    
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
                        <li class="breadcrumb-item active">Listar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h5>Todas Las actividades</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="actividades" class="table table-bordered  table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Ticket</th>
                                        <th class="text-center" width="25%">Nombre</th>
                                        <th class="text-center" width="15%">Ubicación</th>
                                        <th class="text-center">Inicio</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                

                                
									  <!-- Modal -->
									<div class="modal fade" id="modalCerrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										  <div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" >Estas a punto de dar por finalizada esta actividad</h5>
											     

											  	

											</div>
											<form class="card" action="{{ route('actividades.cerrar')}}" method="POST" enctype="multipart/form-data">
												@csrf	
											<div class="modal-body">

												<input type="text" hidden  name="actividad_id" id="actividad_id">
												 
												<label>Recuerda que si es una actividad interna, no es necesario el informe de obras</label>
												
												<input type="file" class="mb-5 form-control" name="doc" id="doc">
											
												
												<div class="form-group mb-3">
                                        
                                                    <label class="text-center form-label">¿Necesita devolver algún material?</label>
                                                    <div class="text-center">
                                                        <label class="switch">
                                                        <input type="checkbox" name="devolucion"><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                
                                            </div>	

											
											</div>
																						
											<div class="modal-footer">

												<button type="submit" class="btn btn-primary" >Cerrar Actividad</button>


											
											
											</div>
										</form>
										  </div>
										</div>
									  </div>


									
                                


                                
                            </table>
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
    


    <script>
        $(document).ready(function(){

            var tabla = $('#actividades').DataTable({
                language: {
                        url: '{{ asset('assets/js/datatable/datatables/es-ES.json') }}',
                     },
                
                    ajax: '{{route('actividades.ajax')}}',
                    columns: [
                        {data: 'id'},
                        {data: 'tipo'},
                        {data: 'ticket'},
                        {data: 'nombre'},
                        {data: 'ubicacion'},
                        {data: 'inicio'},
                        {data: 'estado'},
                        {
                            data: null,
                            render: function(data, type, row) {
                                var render;
                                if(data.estado == 'en proceso'){
                                    render =`
                                    
                                    <button class="editar btn btn-primary btn-sm m-1" title="editar">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="reservar btn btn-danger btn-sm m-1" title="Reservar Material">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button class="ver btn btn-secondary btn-sm m-1" title="Materiales Ocupados">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="devolver btn btn-info btn-sm m-1" title="Devolucion Material">
                                        <i class="fa-solid fa-backward"></i>
                                    </button>
                                    <button class="cerrar btn btn-success btn-sm m-1" title="Cerrar Actividad" data-bs-toggle="modal" data-bs-target="#modalCerrar">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                    
                                    `;

                                }else{
                                    render =
                                        `
                                        <button class="ver btn btn-secondary btn-sm m-1" title="Materiales Ocupados">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        `;
                                }
                                return render;
                                
                            }
                                
                        },
                        
                        
                        ],
                    order: [[5, 'desc']],  
                                
                        
                });

           
            obtener_data_editar('#actividades', tabla);
            obtener_data_reservar('#actividades',tabla);
            obtener_data_editar('#actividades',tabla);
            obtener_data_ver('#actividades',tabla);
            obtener_data_devolver('#actividades',tabla);
            obtener_data_cerrar('#actividades',tabla);
            
           
            
        });

        
        var obtener_data_reservar = function(tbody, tabla){
            $(tbody).on ('click', 'button.reservar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "reservar-material/"+data.id;
               
                
            })
        }
        var obtener_data_editar = function(tbody, tabla){
            $(tbody).on ('click', 'button.editar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "editar-actividad/"+data.id;
               
                
            })
        }
        var obtener_data_ver = function(tbody, tabla){
            $(tbody).on ('click', 'button.ver',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "ver-actividad/"+data.id;
               
                
            })
        }
        var obtener_data_devolver = function(tbody, tabla){
            $(tbody).on ('click', 'button.devolver',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "devolucion-material/"+data.id;
               
                
            })
        }
        var obtener_data_cerrar = function(tbody, tabla){
            $(tbody).on ('click', 'button.cerrar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                var actividad_id = $('#actividad_id').val(data.id);
               
                
            })
        }


        


    </script>

@endsection

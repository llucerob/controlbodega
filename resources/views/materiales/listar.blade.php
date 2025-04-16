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
                    <h3>Materiales</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Materiales</li>
                        <li class="breadcrumb-item active">Listar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid ">
        <div class="row starter-main">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Todos Los Materiales</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="materiales" class="table table-bordered  table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Marca</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Valor Unitario</th>
                                        <th class="text-center">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Atención</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        
                                            <div class="modal-body"> 
                                                <div class="modal-toggle-wrapper">  
                                                  <div class="modal-img text-center">
                                                     <img src="{{asset('assets/images/gif/danger.gif')}}"  width="100px" alt="error">
                                                  </div>
                                                  <h4 class="text-center">¿Realmente desea Eliminar este proveedor?</h4>
                                                  <p class="text-center">Esta acción no se puede deshacer</p>
                                                  
                                                    <a class="btn btn-danger d-flex m-auto pb-10" href="">Eliminar</a>
                                                 
                                                </div>
                                            </div>                                                   
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
    


    <script>
        $(document).ready(function(){

            var tabla = $('#materiales').DataTable({
                language: {
                        url: '{{ asset('assets/js/datatable/datatables/es-ES.json') }}',
                     },
                
                    ajax: '{{route('materiales.ajax')}}',
                    columns: [
                        {data: 'nombre'},
                        {data: 'marca'},
                        {data: 'cantidad'},
                        {data: 'valor_unitario'},
                        {
                            data: null,
                            defaultContent: '<button class="editar btn btn-primary btn-sm m-1" title="editar"><i class="fa-solid fa-pencil"></i></button><button class="comprar btn btn-success btn-sm m-1" title="comprar"><i class="fa-solid fa-dollar"></i></button><button class="listarcompras btn btn-warning btn-sm m-1" title="listarcompras"><i class="fa-solid fa-shopping-basket"></i></button><button class="rutamaterial btn btn-secondary btn-sm m-1" title="rutamaterial"><i class="fa-solid fa-book"></i></button>',
                           
                                
                            },
                        
                        
                        ],               
                        
                });

            //obtener_data_eliminar('#materiales', tabla);
            obtener_data_editar('#materiales', tabla);
            obtener_data_comprar('#materiales',tabla);
            obtener_data_listarcompras('#materiales',tabla);
            obtener_data_rutamaterial('#materiales',tabla);
           
            
        });

       /* 
        <button class="eliminar btn btn-danger btn-sm m-1" title="eliminar"><i class="fas fa-trash-alt"></i></button>
        var obtener_data_eliminar = function(tbody, tabla){
            $(tbody).on ('click', 'button.eliminar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "destroy-proveedor/"+data.id;
               
                
            })
        }*/
        var obtener_data_comprar = function(tbody, tabla){
            $(tbody).on ('click', 'button.comprar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "comprar-material/"+data.id;
               
                
            })
        }
        var obtener_data_editar = function(tbody, tabla){
            $(tbody).on ('click', 'button.editar',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "editar-material/"+data.id;
               
                
            })
        }

        var obtener_data_listarcompras = function(tbody, tabla){
            $(tbody).on ('click', 'button.listarcompras',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "compras-material/"+data.id;
               
                
            })
        }
        var obtener_data_rutamaterial = function(tbody, tabla){
            $(tbody).on ('click', 'button.rutamaterial',function(){
                var data = tabla.row($(this).parents('tr')).data();
                location.href = "consulta-material/"+data.id;
               
                
            })
        }
       


        


    </script>

@endsection

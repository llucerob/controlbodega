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
                        <li class="breadcrumb-item active">Recibir devolución</li>
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
                        <h5>Recibir Devolución</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="actividades" class="table table-bordered  table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Ubicación</th>
                                        
                                        <th class="text-center">Materiales</th>
                                        <th class="text-center">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arr as $a )
                                        <tr>
                                            <td class="text-center">{{$a['actividad_id']}}</td>
                                            <td class="text-center">{{$a['actividad_nombre']}}</td>
                                            <td class="text-center">{{$a['ubicacion']}}</td>
                                            
                                            <td class="text-center">
                                                <ul>
                                                @foreach ($a['material'] as $m)
                                                    <li>{{ $m['material_cantidad'] }}  [{{$m['material_medida']}}] de  {{$m['material_nombre']}}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEntregar">Entregar</button>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="modalEntregar" tabindex="-1" role="dialog" aria-labelledby="modalEntregar" aria-hidden="true">
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
                                                              <h4 class="text-center pb-2">¿Realmente desea recibir estos Materiales?</h4>
                                                              <p class="text-center">Esta acción no se puede deshacer</p>
                                                              
                                                                <a class="btn btn-success d-flex text-center" href="{{ route('materiales.recibedevolucion',$a['actividad_id']) }}">Entregar</a>
                                                             
                                                            </div>
                                                        </div>                                                   
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach
                                </tbody>
                                
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

            var tabla = $('#actividades').DataTable({
                language: {
                        url: '{{ asset('assets/js/datatable/datatables/es-ES.json') }}',
                     },
                
                        
                });
           
            
        });

    </script>

@endsection

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
                        <h5>Listado Actividades Cerradas</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="actividades">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center" width="10%">Ticket</th>
                                        <th class="text-center" width="25%">Nombre</th>
                                        <th class="text-center" width="10%">Ubicación</th>
                                        <th class="text-center" width="10%">Inicio</th>
                                        <th class="text-center" width="10%">Término</th>
                                        
                                        
                                        <th class="text-center">Acciones</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    
                                    @foreach ($actividades as $key => $a)
    
                                        
                                        <tr>
                                            <td class="text-left">{{ $a['id'] }}</td>
                                            {{-- <td class="text-left">{{ $a['ticket'] }}</td> --}}
                                            <td class="text-left">@if($a['actividad_interna'] == 'si' ) ACT. INTERNA @elseif($a['emergencia'] == 'si') ES EMERGENCIA @else {{ $a['ticket'] }} @endif</td>
                                            <td class="text-left">{{ $a['nombre'] }}</td>
                                            <td class="text-left">{{ $a['ubicacion'] }}</td>
                                            <td class="text-left">{{ $a['inicio'] }}</td>
                                            <td class="text-left">{{ $a['fin'] }}</td>
    
                                            
                                        
                                            <td class="text-center">
                                                @if($a['actividad_interna'] == 'si' && $a['archivo'] == null)


                                                @elseif($a['actividad_interna'] == 'no' )

                                                <a type="button" class="btn btn-info" href="{{ url('/storage/'.$a['archivo']) }}"><i class="fa  fa-download"></i></a>
                                            
                                                @endif
 
                                                <a type="button" class="btn btn-danger" href="{{ route('actividades.valorizar', $a['id']) }}"><i class="fa  fa-usd"></i></a>
    
                                            </td>
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
                order: [[5, 'desc']],  
                     
                });
                

        });

        
    </script>

@endsection

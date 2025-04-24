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
                    <h3>Compras</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Materiales</li>
                        <li class="breadcrumb-item active">Listar Compras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            
        <div class="col-md-10">
			<div class="card">
				<div class="card-header">
					<h5>Listado Compras  a {{$nombreproveedor->nombre}}</h5>
                    <p>desde {{$desde}}  hasta  {{$hasta}}</p>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="compras">
							<thead>
								<tr>
								   
									<th class="text-center">Nombre</th>
									<th class="text-center">Cantidad Comprada</th>
									<th class="text-center">Valor Unitario</th>
                                    <th class="text-center">Valor Total</th>
									<th class="text-center">Factura</th>
                                    <th class="text-center">Fecha Compra</th>
									
									
								</tr>
							</thead>
                            <tbody>
                                @foreach($arreglo as $compra)
                                    <tr>
                                        <td class="text-center">{{$compra['nombre']}}</td>
                                        <td class="text-center">{{$compra['cantidad']}}</td>
                                        <td class="text-center">{{$compra['valor']}}</td>
                                        <td class="text-center">{{$compra['total']}}</td>
                                        <td class="text-center">{{$compra['factura']}}</td>
                                        <td class="text-center">{{$compra['fecha']}}</td>
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

            var tabla = $('#compras').DataTable({
                language: {
                        url: '{{ asset('assets/js/datatable/datatables/es-ES.json') }}',
                     },
                
                   
                        
                });

            
            
        });

       


    </script>

@endsection

@extends('layout.master')

@section('title', 'RTL')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select.bootstrap5.css') }}">
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
                        <li class="breadcrumb-item">Actividad</li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid main-scope-project">
        <div class="row scope-bottom-wrapper">
            <div class="col-xxl-2 recent-xl-23 col-xl-3 box-col-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="sidebar-left-icons nav nav-pills" id="add-product-pills-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link" id="overview-project-tab" data-bs-toggle="pill"
                                    href="#overview-project" role="tab" aria-controls="overview-project"
                                    aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use xlink:href="{{ asset('assets/svg/icon-sprite.svg#project-search') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Creada</h6>
                                        <p>{{ $actividad->inicio }}</p>
                                    </div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link @if($actividad->estado == 'en proceso') active @endif" id="activity-project-tab" data-bs-toggle="pill"
                                    href="#activity-project" role="tab" aria-controls="activity-project"
                                    aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-activity') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>En Proceso</h6>
                                    </div>
                                </a></li>
                                <li class="nav-item"><a class="nav-link @if($actividad->estado == 'terminado') active @endif" id="attachment-tab" data-bs-toggle="pill"
                                    href="#attachment" role="tab" aria-controls="attachment" aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-files') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Finalizada</h6>
                                        @if($actividad->estado == 'terminado' || $actividad->estado == 'valorizado')
                                            <p>{{ $actividad->fin }}</p>
                                        @endif
                                    </div>
                                </a></li>
                            <li class="nav-item"> <a class="nav-link @if($actividad->estado == 'valorizado') active @endif" id="budget-project-tab" data-bs-toggle="pill"
                                    href="#budget-project" role="tab" aria-controls="budget-project"
                                    aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#project-badget') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Valorizada</h6>
                                    </div>
                                </a></li>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 recent-xl-77 col-xl-9 box-col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="common-project-header common-space m-b-20">
                            <div class="common-space">
                                <div class="pe-sm-3">
                                    <h5>{{$actividad->nombre }} en {{$actividad->ubicacion}}</h5>   
                               </div>
                                
                                       
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="add-product-pills-tabContent">
                            <div class="tab-pane fade show active" id="overview-project" role="tabpanel"
                                aria-labelledby="overview-project-tab">
                                <div class="row">

                                    <div class="col-xl-8 xl-100 box-col-12">
                                        <div class="card">
                                            <div class="card-header card-no-border">
                                                <div class="common-space">
                                                    <div class="left-header-content">
                                                        <h5>Materiales Ocupados</h5>
                                                        
                                                    </div>
                                                    @if($actividad->estado == 'en proceso')
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="{{ route('materiales.devolucion', $actividad->id) }}">Devolver</a></div>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pt-0">
                                                <div class="recent-table table-responsive custom-scrollbar project-pending-table">
                                                    <table class="table" id="project-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Cantidad Ocupada</th>
                                                                <th>Cantidad Por Devolver</th>
                                                                <th>Cantidad Devuelta</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($actividad->ocupados as $key => $o)
                                                            
                                                            <tr>
                                                                <td>{{$o->nombre}} [{{$o->esmedida->abreviatura}}]</td>
                                                                <td>{{$o->ocupados->cantidad}} [{{$o->esmedida->abreviatura}}]</td>
                                                                <td>{{$o->ocupados->por_devolver}} [{{$o->esmedida->abreviatura}}] </td>
                                                                <td>{{$o->ocupados->devolucion}} [{{$o->esmedida->abreviatura}}]</td>
                                                                <td></td>
                                                            </tr>
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xxl-4 col-md-6 order-xxl-0 order-sm-1 box-col-6 box-ord-1">
                                        <div class="card">
                                            <div class="card-header card-no-border">
                                                <div class="common-space">
                                                    <div class="left-header-content">
                                                        <h5>Informe de obras</h5>
                                                    </div>@if($actividad->archivo != null)
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="{{ url('/storage/'.$actividad->archivo) }}">Descargar</a></div>
                                                            @endif

                                                            

                                                </div>
                                            </div>
                                            
                                            @role(['admin'])

                                            <div class="card-body">
                                                                <div class="row">
                                                                    @if($actividad->estado == 'terminado')
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label class="text-center form-label">¿Desea dejar la actividad "en proceso"?</label>
                                                                            <div class="text-center">
                                                                                <a class="btn btn-primary" href="{{ route('actividades.activar', $actividad->id) }}">Activar</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label class="text-center form-label">¿Desea Saber el valor de la actividad?</label>
                                                                            <div class="text-center">
                                                                                <a class="btn btn-warning" href="{{ route('actividades.valorizar', $actividad->id) }}">Ver Valores</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            </div>
                                            @endrole
                                             
                                        </div>
                                    </div>
                                     

                                    
                                    <div class="col-xl-8 xl-100 box-col-12">
                                        <div class="card">
                                            <div class="card-header card-no-border">
                                                <div class="common-space">
                                                    <div class="left-header-content">
                                                        <h5>Materiales Reservados</h5>
                                                        
                                                    </div>
                                                    @if($actividad->estado == 'en proceso')
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="{{ route('materiales.reservar', $actividad->id) }}">Reservar</a></div>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pt-0">
                                                <div class="recent-table table-responsive custom-scrollbar project-pending-table">
                                                    <table class="table" id="project-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Cantidad Solicitada</th>
                                                                <th>Solicitado</th>
                                                                <th>Acciones</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tbody>
                                                                @foreach($actividad->reservados as $key => $r)
                                                                <tr>
                                                                    <td>{{$r->nombre}} [{{$r->esmedida->abreviatura}}]</td>
                                                                    <td>{{$r->reservados->cantidad}} [{{$r->esmedida->abreviatura}}]</td>
                                                                    <td>{{date_format($r->reservados->created_at, 'Y-m-d')}}</td>
                                                                    <td></td>
                                                                </tr>
                                                                @endforeach
                                                               
                                                            </tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-50 order-xxl-0 order-sm-2 col-md-6 box-col-6 box-ord-2">
                                        <div class="card widget-1">
                                            <div class="card-body">
                                                <div class="widget-content">
                                                    <div class="widget-round primary">
                                                        <div class="bg-round"><svg class="fill-primary">
                                                                <use href="{{ asset('assets/svg/icon-sprite.svg#c-invoice') }}">
                                                                </use>
                                                            </svg><svg class="half-circle svg-fill">
                                                                <use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}">
                                                                </use>
                                                            </svg></div>
                                                    </div>
                                                    <div>
                                                        <h4 class="counter" data-target="0">{{$dias}}</h4><span
                                                            class="f-light">Días Trabajados</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Container-fluid Ends-->
   
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/dataTables.select.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/select.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin_2/custom_touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/custom-project.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    
  
    
    
    
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    
    
   
  

@endsection

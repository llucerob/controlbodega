<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper text-center"><a href="{{route('dashboard')}}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/logo_serviciosayf.png') }}" width="80px" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="#"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Favoritos</h6>
                        </div>
                    </li>
                    @role(['admin'])  
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Valorizaciones</h6>
                        </div>
                    </li>
                    <!--<li class="sidebar-list"><i class="fa-solid fa-thumbtack"> </i><a
                        class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                        </svg><svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                        </svg><span>Usuarios</span></a>
                    <ul class="sidebar-submenu">
                        
                        <li><a href="#">Listar Usuarios</a></li>
                        <li><a href="#">Crear Usuario</a></li>
                    </ul>
                    </li>!-->
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"> </i><a
                        class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                        </svg><svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                        </svg><span>Valorizaciones</span></a>
                    <ul class="sidebar-submenu">
                        
                        <li><a href="{{ route('actividades.trabajosrealizados') }}">Trabajos Realizados</a></li>
                        <li><a href="{{ route('actividades.historial') }}">Historial Valorizaciones</a></li>
                        <li><a href="#">Valorizar Bodega</a></li>
                        
                    </ul>
                    </li>
                    @endrole
               
                    
                     @role(['admin'])  
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Supervisor</h6>
                        </div>
                    </li>
                   
                 
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"> </i><a
                            class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg><span>Actividades </span></a>
                        <ul class="sidebar-submenu">
                            
                            <li><a href="{{ route('actividades.index')}}">Listar Actividades</a></li>
                            <li><a href="{{ route('actividades.enproceso')}}">Listar Actividades En Proceso</a></li>
                            <li><a href="{{ route('actividades.create')}}">Crear Actividad</a></li>
                        </ul>
                    </li>
                    @endrole

                    @role(['secretaria','supervisor'])  
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Supervisor</h6>
                        </div>
                    </li>
                   
                 
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"> </i><a
                            class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg><span>Actividades </span></a>
                        <ul class="sidebar-submenu">
                            
                            
                            <li><a href="{{ route('actividades.enproceso')}}">Actividades En Proceso</a></li>
                            <li><a href="{{ route('actividades.create')}}">Crear Actividad</a></li>
                        </ul>
                    </li>
                    @endrole
                   
                   
                     @role(['admin','bodega'])
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Bodega</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                            class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"> </use>
                            </svg><span>Materiales</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('materiales.index') }}">Listar Materiales</a></li>
                            <li><a href="{{ route('materiales.create') }}">Crear Nuevo Material</a></li>
                            <li><a href="{{ route('materiales.reservados') }}">Materiales Reservados</a></li>
                            <li><a href="{{ route('materiales.recibirdevolucion') }}">Recibir Devolucion</a></li>
                            
                    
                        </ul>
                    </li>
                    @endrole
                    @role(['secretaria'])
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Bodega</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                            class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg><svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"> </use>
                            </svg><span>Materiales</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('materiales.index') }}">Listar Materiales</a></li>
                            <li><a href="{{ route('materiales.create') }}">Crear Nuevo Material</a></li>
                            
                        </ul>
                    </li>
                    @endrole
                    @role(['admin','secretaria'])
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Administrativo</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                        class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                        </svg><svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"> </use>
                        </svg><span>Proveedores</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('proveedores.create')}}">Crear Nuevo Proveedor</a></li>
                        <li><a href="{{route('proveedores.index')}}">Listar Proveedor</a></li>
                        
                        
                        
                    </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                        class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                        </svg><svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"> </use>
                        </svg><span>Compras</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="#">Ingresar Compra</a></li>
                        <li><a href="{{ route('materiales.consultacompras') }}">Consultar Compras</a></li>
                        
                        
                        
                    </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                        class="sidebar-link sidebar-title" href="javascript:void(0)"><svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                        </svg><svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"> </use>
                        </svg><span>Medidas</span></a>
                    <ul class="sidebar-submenu">
                        
                        <li><a href="{{route('medidas.index')}}">Listar Medidas</a></li>
                        
                        
                    </ul>
                    </li>
                    @endrole
                             
                    
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->

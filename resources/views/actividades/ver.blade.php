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
                            <li class="nav-item"> <a class="nav-link active" id="overview-project-tab" data-bs-toggle="pill"
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
                                        <h6>Summary</h6>
                                    </div>
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" id="target-project-tab" data-bs-toggle="pill"
                                    href="#target-project" role="tab" aria-controls="target-project"
                                    aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#project-target') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Status</h6>
                                    </div>
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" id="budget-project-tab" data-bs-toggle="pill"
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
                                        <h6>Finance</h6>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" id="team-project-tab" data-bs-toggle="pill"
                                    href="#team-project" role="tab" aria-controls="team-project" aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#project-users') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Team</h6>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" id="attachment-tab" data-bs-toggle="pill"
                                    href="#attachment" role="tab" aria-controls="attachment" aria-selected="false">
                                    <div class="absolute-border"></div>
                                    <div class="nav-rounded">
                                        <div class="product-icons"><svg>
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-files') }}">
                                                </use>
                                            </svg></div>
                                    </div>
                                    <div class="product-tab-content">
                                        <h6>Attachment</h6>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" id="activity-project-tab" data-bs-toggle="pill"
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
                                        <h6>Activity</h6>
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
                                    <h5>Dashboard<span class="badge badge-light-warning ms-2">In
                                            Progress</span></h5><span class="c-o-light">Create a brand logo
                                        design for a admin.</span>
                                </div>
                                <div class="common-align">
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-40 rounded-circle"
                                                    src="{{ asset('assets/images/dashboard/user/10.jpg') }}"
                                                    alt="user">
                                            </li>
                                            <li class="d-inline-block"><img class="img-40 rounded-circle"
                                                    src="{{ asset('assets/images/dashboard/user/11.jpg') }}"
                                                    alt="user">
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="common-circle bg-lighter-danger">A</div>
                                            </li>
                                            <li class="d-inline-block"><img class="img-40 rounded-circle"
                                                    src="{{ asset('assets/images/dashboard/user/1.jpg') }}"
                                                    alt="user">
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="bg-lighter-dark common-circle"><span class="f-w-500">9+</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6>All tasks : 24</h6>
                                </div>
                            </div>
                            <div class="common-align">
                                <ul class="common-align">
                                    <li><span>Create Date &colon;</span><svg>
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#vector-calendar') }}"></use>
                                        </svg><span>10 Jul, 2024 </span></li>
                                    <li> <span>Due Date &colon;</span><svg>
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#vector-calendar') }}"></use>
                                        </svg><span>10 Aug, 2024</span></li>
                                </ul><a class="btn btn-primary" href="" target="_blank"><i
                                        class="fa-solid fa-plus"></i> Add Project </a>
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
                                                        <h5>Projects Pending</h5>
                                                        <p class="m-0 c-o-light">Total 28 projects pending
                                                        </p>
                                                    </div>
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pt-0">
                                                <div
                                                    class="recent-table table-responsive custom-scrollbar project-pending-table">
                                                    <table class="table" id="project-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>Project Head</th>
                                                                <th>Priority</th>
                                                                <th>Due Date</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Terraform </td>
                                                                <td>
                                                                    <div class="common-flex align-items-center">
                                                                        <img class="img-fluid lead-img"
                                                                            src="{{ asset('assets/images/dashboard-9/user/1.png') }}"
                                                                            alt="user">
                                                                        <div><a class="c-light" href="#!">Eleanor
                                                                                Pena</a>
                                                                            <p class="mb-0 c-o-light">
                                                                                Elea.pena@crzq7.edu</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>High</td>
                                                                <td>15,May 2024</td>
                                                                <td> <button
                                                                        class="btn button-light-success txt-success">In
                                                                        Progress</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GearVibe</td>
                                                                <td>
                                                                    <div class="common-flex align-items-center">
                                                                        <img class="img-fluid lead-img"
                                                                            src="{{ asset('assets/images/dashboard-9/user/2.png') }}"
                                                                            alt="user">
                                                                        <div><a class="c-light" href="#!">Mae
                                                                                Golden</a>
                                                                            <p class="mb-0 c-o-light">
                                                                                mae.golden@crz3q.edu</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>Medium</td>
                                                                <td>10,June 2024</td>
                                                                <td> <button
                                                                        class="btn button-light-warning txt-warning">Pending</button>
                                                                </td>
                                                            </tr>
                                                           
                                                           
                                                            
                                                           
                                                            
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
                                                        <h5>To Do List</h5>
                                                    </div>
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 project-todo">
                                                <ul class="crm-todo-list">
                                                    <li class="d-flex align-items-center"><span
                                                            class="l-line-primary"></span>
                                                        <div class="flex-shrink-0">
                                                            <div class="form-check"><input
                                                                    class="form-check-input checkbox-primary"
                                                                    type="checkbox" value=""></div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="f-w-400">Establish a project plan
                                                            </h6><span class="mb-0">Divide the project
                                                                manageable phases</span>
                                                        </div>
                                                        <div class="dropdown icon-dropdown"><button
                                                                class="btn dropdown-toggle" id="appointmentDropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="icon-more-alt"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="appointmentDropdown"><a
                                                                    class="dropdown-item" href="#">Completed</a><a
                                                                    class="dropdown-item" href="#">Reschedule</a><a
                                                                    class="dropdown-item" href="#">Repeat</a></div>
                                                        </div>
                                                    </li>
                                                    
                                                   
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 xl-100 box-col-12">
                                        <div class="card">
                                            <div class="card-header card-no-border">
                                                <div class="common-space">
                                                    <div class="left-header-content">
                                                        <h5>Projects Pending</h5>
                                                        <p class="m-0 c-o-light">Total 28 projects pending
                                                        </p>
                                                    </div>
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pt-0">
                                                <div
                                                    class="recent-table table-responsive custom-scrollbar project-pending-table">
                                                    <table class="table" id="project-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>Project Head</th>
                                                                <th>Priority</th>
                                                                <th>Due Date</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Terraform </td>
                                                                <td>
                                                                    <div class="common-flex align-items-center">
                                                                        <img class="img-fluid lead-img"
                                                                            src="{{ asset('assets/images/dashboard-9/user/1.png') }}"
                                                                            alt="user">
                                                                        <div><a class="c-light" href="#!">Eleanor
                                                                                Pena</a>
                                                                            <p class="mb-0 c-o-light">
                                                                                Elea.pena@crzq7.edu</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>High</td>
                                                                <td>15,May 2024</td>
                                                                <td> <button
                                                                        class="btn button-light-success txt-success">In
                                                                        Progress</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>GearVibe</td>
                                                                <td>
                                                                    <div class="common-flex align-items-center">
                                                                        <img class="img-fluid lead-img"
                                                                            src="{{ asset('assets/images/dashboard-9/user/2.png') }}"
                                                                            alt="user">
                                                                        <div><a class="c-light" href="#!">Mae
                                                                                Golden</a>
                                                                            <p class="mb-0 c-o-light">
                                                                                mae.golden@crz3q.edu</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>Medium</td>
                                                                <td>10,June 2024</td>
                                                                <td> <button
                                                                        class="btn button-light-warning txt-warning">Pending</button>
                                                                </td>
                                                            </tr>
                                                           
                                                           
                                                            
                                                           
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 xl-50 order-xxl-0 order-sm-2 col-md-6 box-col-6 box-ord-2">
                                        <div class="card">
                                            <div class="card-header card-no-border">
                                                <div class="common-space">
                                                    <div class="left-header-content">
                                                        <h5>Task Overview</h5>
                                                        <p class="m-0 c-o-light">All 209 Task Completed</p>
                                                    </div>
                                                    <div class="card-header-right-btn"><a class="c-o-light"
                                                            href="">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="task-overview">
                                                    <div id="task-overview-chart"></div>
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

@endsection

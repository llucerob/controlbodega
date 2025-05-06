<!DOCTYPE html>
<html lang="en" >

<head>
    @include('layout.head')
    @include('layout.css')
</head>


    <body>
    
  
      
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('layout.header')
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            @include('layout.sidebar')

            <div class="page-body">
                
              
               
                @yield('main_content')
         
                
            </div>

            @include('layout.footer')
  
        </div>

        
    </div>

   
    
    @include('layout.scripts')
   
    
  
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Materiales</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $nombre }}</h2>
            </div>
            <!--
            <div class="col-md-4">
                <div class="mb-4 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ URL::to('#') }}">Materiales de bodega</a>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    
                <thead>
                      <tr>
                        <th scope="col">Nombre Actividad</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Fecha Utilización</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Por Devolver</th>
                      
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($array as $m)
                        <tr>
                            <td scope="row">{{ $m['nombre'] }}</td>
                            <td scope="row">{{ $m['ubicacion'] }}</td>
                            <td scope="row">{{ $m['fecha'] }}</td>
                            <td scope="row">{{ $m['cantidad'] }}</td>
                            <td scope="row">{{ $m['por_devolver'] }}</td>
                            
                                                    
                        </tr>
                        @endforeach
                        
                        @foreach ($arr as $m)
                        <tr>
                            <td scope="row">{{ $m['nombre'] }}</td>
                            <td scope="row">{{ $m['ubicacion'] }}</td>
                            <td scope="row">{{ $m['fecha'] }}</td>
                            <td scope="row">{{ $m['cantidad'] }}</td>
                           
                            
                                                    
                        </tr>
                        @endforeach

                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Ocupados</th>
                            <th> <span color="red"> {{number_format($salidas,0,',','.')}}</span> </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Por Devolver</th>
                            <th>{{number_format($pordevolver,0,',','.')}} </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Reservados</th>
                            <th>{{number_format($reservas,0,',','.')}} </th>
                        </tr>

                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Compras</th>
                            <th>{{number_format($entradas,0,',','.')}} </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>En Bodega</th>
                            <th>{{number_format($stock,0,',','.')}} </th>
                        </tr>
                    </tbody>

                    
                   
                  </table>
            </div>
        </div>

        <div class="row m-3">
            <div class="col-md-12 text-left">
                @if(($entradas+$reservas-$salidas) == $stock)
                <br>
                <h4>El balance de material concuerda con el registrado en bodega</h3>
                @else
                <br>
                <h4>Segun bodega el total deberia ser:  {{number_format($stock,0,',','.')}} </h3>
                @endif
            </div>
            
        </div>


        
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
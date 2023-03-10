<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>

        /* Diseño de la tabla*/

        table, th, td
        {
            border: 1px solid black;            
            border-collapse: collapse;                                         
        }
        td, throw
        {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">{{$title}}</h1>
    <!-- table variables -->
    <table class="table">
        <tr>
            <th class="text-center" scope="col">Usuario</th>                    
            <th class="text-center" scope="col">Numero de identificacion</th>  
            <th class="text-center" scope="col">Telefono</th>
            <th class="text-center" scope="col">Fecha de nacimiento</th>
            <th class="text-center" scope="col">View Card</th>
        </tr>
        @if($info === null)                                              
        <h1>{{$data}}</h1>              
        @endif
        <!-- Data for all users -->
        @foreach($info as $datos) 
        <tr>
            <td class="text-center">{{$datos->user_id}}</td>
            <td class="text-center">{{$datos->identification_number}}</td>         
            <td class="text-center">{{$datos->mobile_number}}</td>
            <td class="text-center">{{$datos->created_at }}</td>
            <td class="text-center"> <a class="btn btn-success" href="transactions/{{$datos->user_id}}"> <i class="fa fa-edit"></i> </a> </td> {{-- se le agrego un boton a cada usuario para poder acceder a su historial de transaccion --}}
        </tr>
        @endforeach
    <table>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</body>
</html>



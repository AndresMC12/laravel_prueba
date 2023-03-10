<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{$title_card}}</title>
    <style>
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

    <h1 class="text-center">{{$title_card}}</h1>
    <a href="/" class="btn btn-primary mb-20">Atras</a>
    <table class="table">
        <tr>
            <th scope="col">Client number</th>
            <th scope="col">Year</th>
            <th scope="col">Mounth</th>
            <th scope="col">Amount</th>                 {{-- Como se realizo en la plantilla index se realizo una tabla con algunos datos del historial de transacciones del cliente --}}
            <th scope="col">Transaction Detail</th>
            <th scope="col">Date Create</th>
        </tr>
        <?php  ?>
        @foreach($details_urs as $datos) 
        <tr>
            <?php ?>
            <td>{{$datos->client_id}}</td>
            <td>{{$datos->year}}</td>            {{--ciclo for para agregar los datos a tabla de historial de transacciones del usuario --}}
            <td>{{$datos->month}}</td>
            <td>{{$datos->amount }}</td>
            <?php    ?>
            @if($datos->transaction_detail != " ")
                <td>{{$datos->transaction_detail }}</td> {{--Es metodo hara que en el espacio donde no haya transaccion aparezca un mensaje en rojo mencionando lo anterior --}}
            @else
                <td class="text-danger"> No tiene transacción </td>
            @endif
            <td>{{$datos->created_at }}</td>
        </tr>
        @endforeach
    <table>
    
</body>
</html>



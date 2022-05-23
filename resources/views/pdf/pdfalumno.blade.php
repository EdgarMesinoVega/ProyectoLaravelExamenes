<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <style>
        .contenedor{
        background-color: #fafafa;
        margin: 1rem;
        padding: 1rem;
        border: 2px solid #ccc;
        /* IMPORTANTE */
        text-align: center;
        }
        .tabla{
            align-content: center;
            border: 1px solid black;
            /* margin: auto; */
            border-collapse: collapse;
            width: 600px;
        }
        .tabla2{
            align-content: center;
            border: 1px solid black;
            /* margin: auto; */
            border-collapse: collapse;
            width: 600px;
        }
        .titulo{
            align-content: center;
            text-align: center;
        }

        .nombrea{
            text-align: left;
        }

        .ida{
            text-align: left;
        }
        .encabezados{
            background-color: rgb(161, 161, 255);
        }

        th{
            border: 1px solid black;
            font-size: 13px;     
            font-weight: normal;     
            padding: 8px;     
            border-bottom: 1px solid #fff;
        }
        td{
            border: 1px solid black;
        }

        .nombre{
            text-align: left;
            padding-left: 50px;
        }
        .id{
            text-align: left;
            padding-left: 50px;
        }
        table th {background-color: yellow; }
        table tr:nth-child(even) {background-color: rgb(227, 241, 255);}
        
    </style>
    <title>Esto es un pdf</title>
</head> 
<body>

    <div class="contenedor">
        <h3 class="titulo">Resultados</h3>
        <h4 class="nombre">Nombre del Alumno : {{auth()->user()->name}} <br>Id del Alumno : {{auth()->user()->id}} </h4>
        <table class="tabla">

            <tr class="encabezados">
                <td>Nombre de Examen</td>
                <td>Numero de Intentos</td>
                <td>Promedio Final</td>
            </tr>
            
                @foreach ($resultados as $res)                   
                <tr>
                        <td>{{$res->tituloExamen}}</td>
                        <td>{{$res->intentos}}</td>
                        <td>{{$res->promedio}}</td>                
                </tr>
                @endforeach  
        </table>    

        <h3 class="titulo">Intentos realizados</h3>
        <table class="tabla2">
            <tr class="encabezados">
                <td>Id Resultado</td>
                <td>Titulo de Examen</td>
                <td>Calificacion</td>
            </tr>

            {{-- segundo for --}}
            @foreach ($calificaciones as $cal)                   
            <tr>
                    <td>{{$cal->idResultado}}</td>
                    <td>{{$cal->tituloExamen}}</td>
                    <td>{{$cal->calificacion}}</td>                
            </tr>
            @endforeach  
        </table>
    </div>

</body>
</html>
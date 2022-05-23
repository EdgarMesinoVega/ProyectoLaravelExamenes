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
        }

        table th {background-color: yellow; }
        table tr:nth-child(even) {background-color: rgb(227, 241, 255);}
        
    </style>
    <title>Esto es un pdf</title>
</head> 
<body>

    <div class="contenedor">
        <h3 class="titulo">Resultados de los Alumno</h3>
        <h4 class="nombre">Maestro: {{auth()->user()->name}} </h4>
        
            <table class="tabla">
                <tr class="encabezados">
                    <td>Id del Alumno</td>
                    <td>Nombre del Alumno</td>
                    <td>Nombre del Examen</td>
                    <td>Numero de Intentos</td>
                    <td>Promedio Final</td>
                </tr>
                
                    @foreach ($listaR as $res)                   
                    <tr>
                        <td>{{$res->idAlumno}}</td>
                        <td>{{$res->alumno}}</td>
                        <td>{{$res->tituloExamen}}</td>
                        <td>{{$res->intentos}}</td>
                        <td>{{$res->promedio}}</td>                
                    </tr>
                    @endforeach        
            </table>    

            <h3 class="titulo">Intentos de los Alumnos</h3>
            <table class="tabla2">
                {{-- seg tabla --}}
                    <tr class="encabezados">
                        <td>Titulo Examen</td>
                        <td>Id Resultado</td>
                        <td>Id del alumno</td>
                        <td>Calificacion</td>
                    </tr>
                    
                    @foreach ($listaC as $cal)                   
                    <tr>
                        <td>{{$cal->tituloExamen}}</td>
                        <td>{{$cal->idResultado}}</td>
                        <td>{{$cal->idAlumno}}</td>                        
                        <td>{{$cal->calificacion}}</td>                        
                    </tr>
                    @endforeach   
            </table>
    </div>

</body>
</html>

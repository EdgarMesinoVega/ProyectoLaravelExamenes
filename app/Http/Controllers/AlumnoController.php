<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use App\Models\Examenes;
use App\Models\Preguntas;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AlumnoController extends Controller
{
    // Home Alumno - ventana
    public function create(){
        return view('sessions.homealumno');
    }

    // Ventana Examenes cards-examenes
    public function examen(){
        $listaExamenes = Examenes::all();   
        return view('sessions.examenalumno',compact('listaExamenes'));
    }


    // Listado de preguntas para el examen
    public function contestarexamen($idExamen){
        $examen = Examenes::all()->where('id',$idExamen);
        $preguntas = Preguntas::inRandomOrder()->where('idExamen',$idExamen)->limit(5)->get();
        return view('sessions.contestarexamen',compact('examen','preguntas'));
    }


    // FUNCION PARA CALIFICAR EL EXAMEN

    public function calificar(Request $request){
        
        // Contadores
        $respuestasCorrectas = 0;
        $cal = 0;
        // pregunta1
        if($request->correcta1 == $request->resp1.$request->resp2.$request->resp3){
                $respuestasCorrectas++;
                $cal = $cal + 20;
        }

        // pregunta2
        if($request->correcta2 == $request->resp4.$request->resp5.$request->resp6){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        // pregunta3
        if($request->correcta3 == $request->resp7.$request->resp8.$request->resp9){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        // pregunta4
        if($request->correcta4 == $request->resp10.$request->resp11.$request->resp12){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }
        // pregunta5
        if($request->correcta5 == $request->resp13.$request->resp14.$request->resp15){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        // Datos 
        $idAlumno = auth()->user()->id;
        $nombreAlumno = auth()->user()->name;
        $idExamen = $request->idExamen;

        //Si el id del examen existe y el id del alumno existe en la tabla de resultados
        if(Resultados::where('idExamen',$idExamen)->where('idAlumno', $idAlumno)->exists()){
            //Asignamos el rgistro que se ecuentre en la posicion
            $intentoResultado = Resultados::where('idExamen',$idExamen)->where('idAlumno', $idAlumno)->get();

            foreach($intentoResultado as $intento){
                $numIntentos = $intento->intentos;
                $idResultado = $intento->id;
            }

            //calificaciones optenidas
            $notas = new calificaciones();
            $notas -> tituloExamen = $request->titulo;
            $notas -> idResultado = $idResultado;
            $notas -> idAlumno = $idAlumno;
            $notas -> idDocente = $request->idUsuario;
            $notas -> nombreAlumno = $request->nombreAlumno;
            $notas -> calificacion = $cal;
            $notas -> save();

            //Sacamos promedio
            $seleccionaPromedio = calificaciones::where('idResultado', $idResultado)->get();
            $nota = 0;
            $cantidadNotas = 0;
            foreach ($seleccionaPromedio as $prom) {
                $cantidadNotas++;
                $nota = $nota + $prom->calificacion;
            }

            $promedio = $nota / $cantidadNotas;
            $numIntentos = $numIntentos+1; 

            $resultados = Resultados::find($idResultado);
            $resultados->idAlumno = $idAlumno;
            $resultados->alumno = $nombreAlumno;
            $resultados->idDocente = $request->idUsuario;
            $resultados->idExamen = $idExamen;
            $resultados->tituloExamen = $request -> titulo;
            $resultados->intentos = $numIntentos;
            $resultados->promedio = $promedio;
            $resultados->save();
        }else{
            $resultados = new Resultados();
            $resultados->idAlumno = $idAlumno;
            $resultados->alumno = $nombreAlumno;
            $resultados->idDocente = $request -> idUsuario;
            $resultados->idExamen = $idExamen;
            $resultados->tituloExamen =  $request -> titulo;
            $resultados->intentos = 1;
            $resultados->promedio = $cal;
            $resultados->save();

            $idResultado = $resultados->id;
            //Notas
            $notas = new calificaciones();
            $notas -> tituloExamen = $request->titulo;
            $notas -> idResultado = $idResultado;
            $notas -> idAlumno = $idAlumno;
            $notas -> idDocente = $request->idUsuario;
            $notas -> nombreAlumno = $request->nombreAlumno;
            $notas -> calificacion = $cal;
            $notas -> save();
        }

        return view('sessions.calificacionexamen', compact('cal'));
    }


       // ventana Resultados
       public function resultados(){
        $idAlumno = auth()->user()->id;
        $listaCalificaciones = calificaciones::all()->where('idAlumno',$idAlumno);
        $listaResultados = Resultados::all()->where('idAlumno',$idAlumno);
        return view('sessions.resultadosalumno', compact('listaCalificaciones', 'listaResultados'));
    }

    public function generarpdf(){
        $dompdf = App::make("dompdf.wrapper");
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);
        $calificaciones = calificaciones::all()->where('idAlumno',$idAlumno);
        $dompdf->loadView('pdf.pdfalumno',compact('resultados','calificaciones'))->setOptions(
            ['defaultFont'=>'sans-serif']);
        return $dompdf->download('resultados.pdf');
    }

}


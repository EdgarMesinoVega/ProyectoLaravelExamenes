<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use App\Models\Examenes;
use App\Models\Preguntas;
use App\Models\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DocenteController extends Controller
{
    public function create(){
        return view('sessions.homedocente');
    }

    // Examenes docente
    public function examen(){
        $idUsuario = auth()->user()->id;
        $listaExamenes = Examenes::all()->where('idUsuario', $idUsuario);
        return view('sessions.examendocente', compact('listaExamenes'));
    }

    
    // card para crear examen (TITULO)
    public function storeExamen(){
        return view('sessions.carddatosexamen');
    }

    //recibir lo de un formulario deifnimos obj request
    public function storeCrearExamen(Request $request){

        // Validacion de examen repetido
        $rules=[
            'titulo'=>'required|unique:examenes,titulo'
        ];
        $messages = [
            'titulo.required' => 'Debes ingresar un titulo',
            'titulo.unique' => 'Este titulo ya existe',
        ];
        
        $this->validate($request, $rules, $messages);

        $examen = new Examenes();
        $examen -> titulo = $request->titulo;
        $examen -> maestro = $request->maestro;
        $examen -> idUsuario = $request->idUsuario;
        $examen->save();
        
        $id = $examen -> id;
        return view('sessions.generarexamen', compact('id'));
    }
    
    // Card para crear las preguntas del examen
    public function storePreguntas(){
        return view('sessions.generarExamen');
    }
    
    // Guardado de preguntas del examen
    public function storeCrearPreguntas(Request $request){
        
        $preguntas = new Preguntas();
        $preguntas -> pregunta = $request -> pregunta;
        $preguntas -> opcion1 = $request -> opcion1;
        $preguntas -> opcion2 = $request -> opcion2;
        $preguntas -> opcion3 = $request -> opcion3;
        // $preguntas -> correcta = $request -> correcta;
        // if($request->correcta=="1"){
        //     $respcorrecta = $request -> opcion1;
        // }
        // if($request->correcta=="2"){
        //     $respcorrecta = $request -> opcion2;
        // }   
        // if($request->correcta=="3"){
        //     $respcorrecta = $request -> opcion3;
        // } 

        // $preguntas -> correcta = $request -> correcta;
        // $preguntas -> correcta = $respcorrecta;

        $respcorrecta = "";

        if($request -> correcta1=="1"){
            $respcorrecta = $respcorrecta.$request -> opcion1;
        }

        if($request -> correcta2=="2"){
            $respcorrecta = $respcorrecta.$request -> opcion2;
        }

        if($request -> correcta3=="3"){
            $respcorrecta = $respcorrecta.$request -> opcion3;
        }

        $preguntas -> correcta =$respcorrecta;
        $preguntas -> idExamen = $request -> idExamen;
        
        $preguntas -> save();
        $id = $preguntas -> idExamen;
        return view('sessions.generarexamen', compact('id'));
    }
    
    // funcion para eliminar un examen 
    public function destroy($examen){   
        $valor= Examenes::find($examen);
        $valor->delete();
        
        $idUsuario = auth()->user()->id;
        $listaExamenes = Examenes::all()->where('idUsuario', $idUsuario);
        // return view('sessions.examendocente', compact('listaExamenes'))->with('eliminar','eliminado');
        return redirect()->route('homedocente.examen',['listaExamenes'=>$listaExamenes])->with('eliminar','eliminado');
    }


    // Editar Examen
    public function editarExamen($idExamen){
        // se recibe tanto la base de datos de Examen como de pregunta
        $examen = Examenes::all()->where('id',$idExamen);
        $preguntas = Preguntas::all()->where('idExamen',$idExamen);
        return view('sessions.editarexamen',compact('examen','preguntas'));
    }
    
    
    // Funcion para Eliminar una pregunta
    
    public function destroyPregunta($idPregunta){
        // Pregunta a borrar
        $preguntaborrar = Preguntas::find($idPregunta);
        // idExamen
        $idExa = $preguntaborrar->idExamen;
        
        // Redireccion al formulario para crear una pregunta
        $examen = Examenes::all()->where('id',$idExa);
        $preguntasrec = Preguntas::all()->where('idExamen',$idExa);
        
        if(count($preguntasrec)<=5){
            $preg = Preguntas::all()->where('idExamen',$idExa);
            return redirect()->route('homedocente.editarexamen',['examen'=>$examen,
            'preguntas'=>$preg,$idExa])->with('eliminarPreg','eliminarPreg');
        }else{
            $preguntaborrar ->delete();
            $preguntas = Preguntas::all()->where('idExamen',$idExa);
            // return view('sessions.editarexamen',compact('examen','preguntas'));
            return redirect()->route('homedocente.editarexamen',['examen'=>$examen,
            'preguntas'=>$preguntas,$idExa])->with('deletepreg','deletepreg');
        }
    }
     
    // Funcion para agregar una pregunta
    public function addPregunta($idExamen){
        $examen = Examenes::all()->where('id',$idExamen);
        return view('sessions.agregarPregunta',compact('idExamen','examen'));
    }
    
    // Funcion para guardar la pregunta
    public function savePregunta(Request $request){
        $respcorrecta = "";
        $preguntas = new Preguntas();
        $preguntas->pregunta = $request->pregunta;
        $preguntas->opcion1 = $request->opcion1;
        $preguntas->opcion2 = $request->opcion2;
        $preguntas->opcion3 = $request->opcion3;

        // if($request->correcta=="1"){
        //     $respcorrecta = $request -> opcion1;
        // }
        // if($request->correcta=="2"){
        //     $respcorrecta = $request -> opcion2;
        // }   
        // if($request->correcta=="3"){
        //     $respcorrecta = $request -> opcion3;
        // } 

        // $preguntas->correcta = $request->correcta;

        $respcorrecta = "";

        if($request -> correcta1=="1"){
            $respcorrecta = $respcorrecta.$request -> opcion1;
        }

        if($request -> correcta2=="2"){
            $respcorrecta = $respcorrecta.$request -> opcion2;
        }

        if($request -> correcta3=="3"){
            $respcorrecta = $respcorrecta.$request -> opcion3;
        }

        $preguntas -> correcta =$respcorrecta;
        $preguntas->idExamen = $request->idExamen;
        $preguntas->save();
        
        $idExamen = $preguntas -> idExamen;
        $examen = Examenes::all()->where('id',$idExamen);
        // return view('sessions.agregarPregunta',compact('idExamen','examen'));
        return redirect()->route('homedocente.editarexamen',['idExamen'=>$idExamen,
        'examen'=>$examen])->with('addpregunta','addpregunta');
    }
    
    // Funcion para editar la pregunta - view formulario
    public function editarPregunta($idExamen){
        $pregunta = Preguntas::all()->where('id',$idExamen);
        return view('sessions.editarpregunta', compact('pregunta'));
    }
    
    public function saveEditarPregunta(Request $request,Preguntas $collPregunta){
        $collPregunta -> pregunta = $request ->pregunta;
        $collPregunta -> opcion1 = $request ->opcion1;
        $collPregunta -> opcion2 = $request ->opcion2;
        $collPregunta -> opcion3 = $request ->opcion3;
        // $collPregunta -> correcta = $request ->correcta;

        $respcorrecta = "";
        if($request -> correcta1=="1"){
            $respcorrecta = $respcorrecta.$request -> opcion1;
        }

        if($request -> correcta2=="2"){
            $respcorrecta = $respcorrecta.$request -> opcion2;
        }

        if($request -> correcta3=="3"){
            $respcorrecta = $respcorrecta.$request -> opcion3;
        }

        $collPregunta -> correcta =$respcorrecta;
        $collPregunta -> idExamen = $request ->idExamen;
        $collPregunta->save();
        
        $idExa = $collPregunta->idExamen;
        $examen = Examenes::all()->where('id',$idExa);
        $preguntas = Preguntas::all()->where('idExamen',$idExa);
        // return view('sessions.editarexamen',compact('examen','preguntas'));
        return redirect()->route('homedocente.editarexamen',['examen'=>$examen,
        'preguntas'=>$preguntas,$idExa])->with('editPregunta','editPregunta');
    }
    
        // ventana resultados Docente
        public function resultados(){
            $idDoc=auth()->user()->id;
            $listaCalificaciones = calificaciones::all()->where('idDocente',$idDoc);    
            $listaResultados = Resultados::all()->where('idDocente',$idDoc);
            return view('sessions.resultadosdocente', compact('listaCalificaciones', 'listaResultados'));
        }


        public function crearpdf(){
            $dompdf = App::make("dompdf.wrapper");
            $listaC = calificaciones::all();
            $listaR = Resultados::all();
            $dompdf->loadView('pdf.pdfdocente',compact('listaC','listaR'))->setOptions(
                ['defaultFont'=>'sans-serif']);
            return $dompdf->download('PDF_resultados.pdf');
        }

        public function editartitulo($idExamen){
        $examen = Examenes::all()->where('id',$idExamen);
        return view('sessions.editartituloexamen',compact('examen'));
        }

        // Para guardar el nuevo titulo del examen
    public function guardartituloedit(Request $request, Examenes $collexa){
        $request->validate([
            'titulo'=>'required|unique:examenes,titulo'
        ]);

        $collexa -> titulo = $request ->titulo;
        $collexa -> idUsuario = $request ->idUsuario;
        $collexa->save();

        $idUsuario = auth()->user()->id;
        $listaExamenes = Examenes::all()->where('idUsuario', $idUsuario);
        return view('sessions.examendocente', compact('listaExamenes'));
    }
}


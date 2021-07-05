<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\pregunta;

class FAQController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function obtenerTabla()
    {
        $datos = DB::table('preguntas')//OBTIENE LOS REGISTROS DE LA BASE DE DATOS
            ->orderBy('id')
            ->get();
        $cantidad = DB::table('preguntas')->count();//SE OBTIENE LA CANTIDAD

        return view('abm-preguntasfrecuentes', ['datos' => $datos],['cantidad' => $cantidad]);
    }

    public function guardarRegistro(Request $request)
    {
        //dd($request->all());
        $preg = $request->input('Pregunta');
        $resp = $request->input('Respuesta');
        $autor = $request->input('Autor');
        if (strlen($preg)>0 and strlen($resp)>0){
            DB::table('preguntas')->insert([
                'pregunta' => $preg,
                'respuesta' => $resp,
                'autor' => $autor
            ]);
        }

        return redirect()->route('cargarTabla');
    }


    public function  Delete($id)
    {
       
        DB::table('preguntas')->delete($id);
    
        return redirect()->route('cargarTabla');
    }

    public function Editar($id)
    {
       $preg=DB::table('preguntas')->find($id);//Obtengo un registro.
       
       return view('Editar',compact('preg'));
    }

    public function Update(Request $request,$id)
    {
       DB::table('preguntas')->where('id',$id)->update([
        'pregunta' => $request->Pregunta,
        'respuesta' => $request->Respuesta,
        'autor' => $request->Autor
       ]);
               
        return redirect()->route('cargarTabla');
    }
}
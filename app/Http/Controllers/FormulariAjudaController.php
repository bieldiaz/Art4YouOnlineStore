<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PreusFiltrador;
use Illuminate\Support\Facades\DB;

class FormulariAjudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::guest()) {
            return view('questionario');
        } else {
            return redirect('/login')->with('success_message', 'Tienes de estar logeado para hacer el Questionario!');
        }
    }

    public function indexresultados()
    {
        return view('resultadosquestionario');
    }

    public function agafarPreguntes(Request $request)
    {


        $estilo =  $request->input('estilo');

        $tematica =   $request->input('tematica');

        $medidas =   $request->input('medidas');

        $presupuesto =   $request->input('presupuesto');

        $preusFilter =  PreusFiltrador::all('nom');

        $preusFilter2 =  PreusFiltrador::all();


        if ($medidas == "Pequeño") {
            $alt = 50;
            $ample = 50;
        } else if ($medidas == "Mediano") {
            $alt = 100;
            $ample = 100;
        } else if ($medidas == "Grande") {
            $alt = 200;
            $ample = 200;
        } else if ($medidas == "Extra Grande") {
            $alt = 300;
            $ample = 300;
        }

        if ($preusFilter = $presupuesto) {
            $valor1 = DB::table('preus_filtradors')->select('valor')->where('nom', '=', $presupuesto)->get()->pluck('valor');
            $valor2 = DB::table('preus_filtradors')->select('valor2')->where('nom', '=', $presupuesto)->get()->pluck('valor2');
        }

        $resultados = DB::table('Products')->whereBetween('preu', [$valor1, $valor2])->where('estilo', '=', $estilo)->where('alt', '>=', $alt)->where('ample', '>=', $ample)->where('vendido', '=', null)->get();


        return view('resultadosquestionario', compact("resultados", "valor1", "valor2"));
    }
}

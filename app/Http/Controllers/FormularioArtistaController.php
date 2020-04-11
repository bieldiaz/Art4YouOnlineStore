<?php

namespace App\Http\Controllers;

use App\ArtistaFormulario;
use Illuminate\Http\Request;

class FormularioArtistaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/(01)[0-9]{9}/',
            'about' => 'required'
        ]);
        $artistaForm = new ArtistaFormulario();

        $artistaForm->nomcomplert = $request['nombrecompleto'];
        $artistaForm->correo = $request['correo'];
        $artistaForm->telefono = $request['telefono'];
        $artistaForm->textoFormulario = $request['about'];

        //dd($request->all());
        $artistaForm->save();


        return redirect()->back();
    }
}

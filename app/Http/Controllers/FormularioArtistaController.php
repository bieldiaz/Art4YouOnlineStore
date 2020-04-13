<?php

namespace App\Http\Controllers;

use App\ArtistaFormulario;
use Illuminate\Http\Request;

class FormularioArtistaController extends Controller
{
    public function index()
    {
        return view('formulariartista');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombrecompleto' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|numeric|min:10',
            'about' => 'required'
        ]);

        $artistaForm = new ArtistaFormulario();
        $artistaForm->nomcomplert = $request['nombrecompleto'];
        $artistaForm->correo = $request['correo'];
        $artistaForm->telefono = $request['telefono'];
        $artistaForm->textoFormulario = $request['about'];
        $artistaForm->save();
        $request->session()->flash('success_message', 'Te has inscrito como artista correctamente! Proximamente contactaremos contigo!');
        return redirect()->back();
    }
}

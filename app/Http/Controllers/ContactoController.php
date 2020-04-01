<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;


class ContactoController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'message' => 'required'
        ]);

        $contacto = new Contacto();

        $contacto->nombre = $request['nombre'];
        $contacto->email = $request['email'];
        $contacto->telefono = $request['telefono'];
        $contacto->message = $request['message'];

        $contacto->save();

        return redirect()->back()->with('flash_message', 'Gracias por tu mensage');
    }
}
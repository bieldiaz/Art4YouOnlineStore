<?php

namespace App\Http\Controllers;

use App\ArtistaFormulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contacto;
use App\Pedidos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) { //PEDIDOS INDIVIDUAL
            $todospedidos = Pedidos::all();
            $emailUser = Auth::user()->email;
            $pedidoIndividual = Pedidos::where('correo', 'like', "%$emailUser%")->get();
        }

        return view('home', compact('pedidoIndividual'));
    }

    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $user->name = $request['name'];
            $user->telefono = $request['telefono'];
            $user->postal = $request['postal'];
            $user->direccion = $request['direccion'];
            $user->ciudad = $request['ciudad'];
            $user->provincia = $request['provincia'];
            $user->save();
            $request->session()->flash('success', 'Tu usuario ha sido modificado correctamente');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function pedidosClientes()
    {
        $pedidos = Pedidos::all();

        return view('adminpanels.pedidosClientesPanel', compact('pedidos'));
    }

    public static function pedidosClientesPanel(Request $request)
    {

        if (isset($_POST['saveFiltro'])) {

            $pedidos = $request->get('emailpedidos');

            if (is_null($pedidos)) {
                $pedidos = null;
            } elseif (!is_null($pedidos)) {
                $pedidos = Pedidos::where('correo', 'like', "%$pedidos%")->paginate(12);
            }
        } else {
            $pedidos = Pedidos::all();
        }

        return view('adminpanels.pedidosClientesPanel', compact('pedidos'));
    }


    public function mensajesContacto()
    {
        $messagesContacto = Contacto::all();

        return view('adminpanels.mensajesContactoPanel', compact('messagesContacto'));
    }

    public function mensajesContactoPanel(Request $request)
    {
        if (isset($_POST['save'])) {

            $nombre = $request->get('nombrefiltro');
            $data = $request->get('data');

            if (is_null($nombre) && is_null($data)) {
                $messagesContacto = null;
            } elseif (is_null($nombre) && !is_null($data)) {
                $messagesContacto = Contacto::where('created_at', 'like', "%$data%")->paginate(12);
            } elseif (!is_null($nombre) && is_null($data)) {
                $messagesContacto = Contacto::where('nombre', 'like', "%$nombre%")->paginate(12);
            }
        } else {
            $messagesContacto = Contacto::all();
        }
        return view('adminpanels.mensajesContactoPanel', compact('messagesContacto'));
    }


    public function registroPintores()
    {
        $pintores = ArtistaFormulario::all();

        return view('adminpanels.registropintorespanel', compact('pintores'));
    }

    public static function registroPintoresFiltrador(Request $request)
    {
        if (isset($_POST['save'])) {

            $pintores = $request->get('nombrefiltro');

            if (is_null($pintores)) {
                $pintores = null;
            } elseif (!is_null($pintores)) {
                $pintores = ArtistaFormulario::where('nomcomplert', 'like', "%$pintores%")->paginate(12);
            }
        } else {
            $pintores = ArtistaFormulario::all();
        }

        return view('adminpanels.registropintorespanel', compact('pintores'));
    }
}

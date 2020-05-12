<?php

namespace App\Http\Controllers;

use App\Estil;
use App\PreusFiltrador;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //print_r($request->all());
        $valorObtingut = $request->get('test-2');
        $valorObtingut2 = explode(';', $valorObtingut);

        $valor1 = $valorObtingut2[0];

        if (!isset($valorObtingut2[1])) {
            $valorObtingut2[1] = null;
        }

        $valor2 = $valorObtingut2[1];

        $valorEstil = $request->get('valorEstil');


        $artistaForeing = DB::table('products')->join('artistas', 'artistas.id_artista', '=', 'products.id_artista')
            ->select('artistas.*', 'products.*')->distinct()->paginate(6);

        $products = Products::all();

        $filter = PreusFiltrador::all();

        $products = Products::all();

        $estil = Estil::all();

        return view('obras', compact('products', 'artistaForeing', 'filter', 'valor1', 'valor2', 'estil', 'valorEstil'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $titol
     * @return \Illuminate\Http\Response
     */
    public function show($titol)
    {
        $product = Products::where('titol', $titol)->firstOrFail();

        $productosAlsoLike = Products::where('titol', '!=', $titol)->inRandomOrder()->take(3)->get();

        $artistaForeing = DB::table('products')->join('artistas', 'artistas.id_artista', '=', 'products.id_artista')
            ->select('artistas.*', 'products.*')->distinct()->get();

        return view('product', compact('product', 'productosAlsoLike', 'artistaForeing'));
    }
}

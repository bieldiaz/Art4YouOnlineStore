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
        $valor1 = $request->get('valor1');
        $valor2 = $request->get('valor2');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

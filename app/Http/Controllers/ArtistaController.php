<?php

namespace App\Http\Controllers;

use App\Artistas;
use App\Products;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artistaForeing = DB::table('products')->join('artistas', 'artistas.id_artista', '=', 'products.id_artista')
            ->select('artistas.*', 'products.*')->distinct()->get();

        $nomArtista = $artistaForeing->keyBy('nomcomplert'); //SABER EL NOM DEL PINTORS QUE EXISTEIXEN
        $artistaInd = Artistas::all();


        return view('artistas', compact('artistaForeing', 'artistaInd', 'nomArtista'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomartista)
    {
        $artista = Artistas::where('nomcomplert', $nomartista)->firstOrFail();

        $artistaForeing = DB::table('products')->join('artistas', 'artistas.id_artista', '=', 'products.id_artista')
            ->select('artistas.*', 'products.*')->distinct()->get();

        $nomArtista = $artistaForeing->keyBy('nomcomplert'); //SABER EL NOM DEL PINTORS QUE EXISTEIXEN

        //dd($artistaForeing);

        return view('artista', compact('artista', 'artistaForeing', 'nomArtista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filtrador(Request $request)
    {
        $artistaForeing = DB::table('products')->join('artistas', 'artistas.id_artista', '=', 'products.id_artista')
            ->select('artistas.*', 'products.*')->distinct()->get();

        if (isset($_POST['buscar'])) {
            $nombre = $request->get('nombrefiltro');
            if (is_null($nombre)) {
                $artistaInd = null;
            } else {
                $artistaInd = Artistas::where('nomcomplert', 'like', "%$nombre%")->paginate(5);
            }
        } else {
            $products = Artistas::all();
        }

        return view('artistas', compact('artistaInd', 'artistaForeing'));
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

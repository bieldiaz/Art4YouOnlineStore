<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Support\Facades\Auth;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('carro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Products $product)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id_producte;
        });


        if ($duplicates->isnotEmpty()) {
            return redirect()->route('carro')->with('success_message', 'Esta obra està ya en tu carro!');
        } else {

            Cart::add($product->id_producte, $product->titol, 1, $product->preu, ['img' => $product->img]);

            return redirect()->route('carro')->with('success_message', 'Has añadido una obra correctamente!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Obra eliminada del carro correctamente!');
    }


    /**
     * Guardar para despues
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guardarParaDespues($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('carro')->with('success_message', 'Tu obra ya esta guardada!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price, ['img' => $item->options->img]);

        return redirect()->route('carro')->with('success_message', 'Tu obra esta guardara para mas tarde!!');
    }
}

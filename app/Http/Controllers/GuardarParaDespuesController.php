<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class GuardarParaDespuesController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success_message', 'Obra eliminada correctamente!');
    }

    public function moverACarro($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('carro')->with('success_message', 'Tu obra ya esta en el carro!');
        }



        Cart::instance('default')->add($item->id, $item->name, 1, $item->price, ['img' => $item->options->img]);

        return redirect()->route('carro')->with('success_message', 'Tu obra ha sido movida al carro!');
    }
}

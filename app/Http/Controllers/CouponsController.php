<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class CouponsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('codi', $request->coupon_code)->first();

        if (!$coupon) {
            return redirect()->route('checkout.index')->withErrors('Codigo no es valido! :(');
        }

        $var = str_replace(',', '', Cart::subtotal());

        session()->put('coupon', [
            'name' => $coupon->codi,
            'discount' => $coupon->discount($var)
        ]);
        return redirect()->route('checkout.index')->with('success_message', 'Codigo ha sido aplicado correctamente! :)');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return redirect()->route('checkout.index')->with('success_message', 'El codigo ha sido eliminado!');
    }
}

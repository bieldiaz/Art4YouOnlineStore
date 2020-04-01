<?php

namespace App\Http\Controllers;

use App\Order;
use App\Products;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use App\Pedidos;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Prophecy\Promise\ReturnPromise;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::guest()) {
            $tax = config('cart.tax') / 100;
            $discount = session()->get('coupon')['discount'] ?? 0;
            $var = str_replace(',', '', Cart::subtotal());

            $newSubtotal = ($var - $discount);
            $newTax = $newSubtotal * $tax;
            $newTotal = $newSubtotal * (1 + $tax);

            return view('checkout')->with([
                'discount' => $discount,
                'newSubtotal' => $newSubtotal,
                'newTax' => $newTax,
                'newTotal' => $newTotal
            ]);
        } else {
            return redirect('/login')->with('success_message', 'Tienes de estar logeado por hacer una compra!');
        }
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
        try {

            //$charge = Stripe::charges()->create([
            //    'amount' => Cart::total(),
            //    'currency' => 'CAD',
            //    'source' => $request->stripeToken,
            //    'description' => 'Order',
            //    'receipt_email' => $request->email,
            //    'metadata' => [
            //          'contents' => $contents,
            //        'quantity' => Cart::instance('default')->count(), */],
            //]);
            //SUCCESFULL


            $duplicates = Cart::search(function ($cartItem) {
                return $cartItem->name;
            });

            $nom = $duplicates->keyBy('name');

            $idProducte = $duplicates->keyBy('id');
            $idProducte2 = $idProducte->pluck('id');


            foreach ($idProducte2 as $itemProducteBaja) {
                $pedidoBAJA = DB::table('products')->where('id_producte', $itemProducteBaja)->update(['vendido' => "1"]);
            }


            //dd($pedidoBAJA);

            $pedido = new Pedidos();



            $pedido->nombrecompleto = $request->nombre;
            $pedido->correo = $request->email;
            $pedido->ciudad = $request->ciudad;
            $pedido->direccion = $request->direccion;
            $pedido->provincia = $request->provincia;
            $pedido->codigopostal = $request->postal;
            $pedido->telefono = $request->telefono;
            $pedido->precioACobrar = $request->get('newTotal');
            $pedido->obras = $nom->pluck('name');

            //dd($pedido);
            $pedido->save();

            Mail::send(new OrderPlaced($pedido));

            Cart::instance('default')->destroy();

            return redirect()->route('gracias.index')->with('success_message', 'Gracias! Tu compra ha sido realizada correctamente! :)');
        } catch (Exception $e) { }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

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

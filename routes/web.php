<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* WELKOME VIEW */

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', 'LandingPageController@index')->name('welcome');

/* =================*/
/* OBRAS VIEW */

Route::get('obras', 'ObrasController@index')->name('Obras');

Route::get('/obras/{product}', 'ObrasController@show')->name('product'); //SINGLE PRODUCT


/* =================*/

/* CARRO VIEW */

Route::get('/carro', 'CarroController@index')->name('carro');
Route::post('/carro/{product}', 'CarroController@store')->name('carro.store');
Route::delete('/carro/{product}', 'CarroController@destroy')->name('carro.destroy');
Route::post('/carro/GuardarParaDespues/{product}', 'CarroController@guardarParaDespues')->name('carro.guardarParaDespues');

Route::delete('/despues/{product}', 'GuardarParaDespuesController@destroy')->name('saveForLater.destroy');
Route::post('/despues/GuardarParaDespues/{product}', 'GuardarParaDespuesController@moverACarro')->name('saveForLater.guardarACarro');

Route::get('empty', function () {
    Cart::destroy();
});
/* =================*/

/* CHECKOUT VIEW */

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


route::post('/coupon', 'CouponsController@store')->name('coupon.store');
route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

/* =================*/
/* ARTISTA I ARTISTAS VIEW */

Route::get('/artistas', 'ArtistaController@index')->name('artista');
Route::get('/artista/{artista}', 'ArtistaController@show')->name('artista.show'); //SINGLE ARTISTA

Route::post('/artistas', 'ArtistaController@filtrador')->name('artista.filtrador'); //FILTRADOR ARTISTAS

/* =================*/

/* CONTACTO VIEW */

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('contacto', [
    'uses' => 'ContactoController@store',
    'as' => 'contacto.store'
]);

/* =================*/

Route::get('/questionario', function () {
    return view('questionario');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

route::get('/gracias', 'ConfirmationController@index')->name('gracias.index');


//Login i registro 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@adminpanel')->name('home');
Route::post('/home', 'HomeController@adminpanel')->name('home.adminpanel');

Route::get('/edit/user/', 'HomeController@edit')->name('user.edit');
Route::post('/edit/user/', 'HomeController@update')->name('user.update');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/eresartista', function () {
    return view('registroartista');
});

Route::get('/formularioartista', function () {
    return view('formulariartista');
});

Route::post('/formularioartista', 'FormularioArtistaController@store')->name('artistaForm.store'); //FILTRADOR ARTISTAS

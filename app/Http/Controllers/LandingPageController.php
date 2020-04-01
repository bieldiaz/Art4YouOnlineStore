<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::inRandomORder()->take(3)->get();

        return view('welcome')->with('products', $products);
    }
}

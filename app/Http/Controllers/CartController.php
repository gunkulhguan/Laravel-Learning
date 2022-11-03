<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        return view('cart');

    }

    public function store($product_id)
    {
        auth()->user()->products()->syncWithoutDetaching($product_id);
        return 'save finish'.$product_id;

    }
}

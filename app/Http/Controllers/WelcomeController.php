<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Category;
use App\Product;


class WelcomeController extends Controller
{
    public function index(){
        $category = Category::all();

        $product = Product::latest()->limit(6)->get();

        return view('welcome',compact('category','product'));
    }
    public function show($id){

        //$product = Category::findOrFail($id)->products()->get();
        $category_all = Category::all();
        //$category_all = Category::all();
        $category = Category::with(['products' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->where('id','=',$id)->orderby('id','asc')->first();


        return view('show',compact('category','category_all'));

    }
}

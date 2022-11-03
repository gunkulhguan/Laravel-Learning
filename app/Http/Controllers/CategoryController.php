<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$category = Category::select('id', 'name')->where('name','หนังสือ')->get();
        $category = Category::orderby('id','desc')->get();
        $all_category = Category::count();
        return view('backend.category.category',compact('category','all_category'));
    }

    public function store()
    {
        $category = Category::destroy(5);


        return 'finish delete';
    }
}

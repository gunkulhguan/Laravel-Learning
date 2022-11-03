<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use Illuminate\Support\Facades\Storage;
use Image;
use Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->orderby('id','desc')->paginate(10);
        return view('backend.product.index',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_all = Category::all()->pluck('name','id');
        Session::flash('fail', 'ล้มเหลว');
        return view('backend.product.create',compact('category_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $add_product = new Product();
        $add_product->name = $request->name;
        $add_product->price = $request->price;
        $add_product->category_id = $request->category_id;

        // check and upload
        if($request->hasfile('picture')){
            $newfilename = str_random(10) . '.' . $request->file('picture')->getClientOriginalExtension();
            $request->picture->storeAs('images',$newfilename,'public');

            //save db
            $add_product->picture = $newfilename;

            //resize
            $path = Storage::disk('public')->path('images/resize/');
            Image::make($request->picture->getRealPath(),$newfilename)->resize(120,null, function($constraint){
                $constraint->aspectRatio();
            })->save($path.$newfilename);
        }





        $add_product->save();



        Session::flash('feedback', 'บันทึกเรียบร้อย');


        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category_all = Category::all()->pluck('name','id');
        Session::flash('fail', 'ล้มเหลว');
        return view('backend.product.edit',compact('product','category_all'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;


        //เช็คว่ามีการอัพไฟล์มาในฟอร์มไหม
        if($request->hasfile('picture')){

            //delete file old ก่อน
            if($product != 'nopic.png'){
                Storage::disk('public')->delete('images/'.$product->picture);
                Storage::disk('public')->delete('images/resize/'.$product->picture);
            }

            $newfilename = str_random(10) . '.' . $request->file('picture')->getClientOriginalExtension();
            $request->picture->storeAs('images',$newfilename,'public');

            //save filename in db
            $product->picture = $newfilename;

            //resize
            $path = Storage::disk('public')->path('images/resize/');
            Image::make($request->picture->getRealPath(),$newfilename)->resize(120,null, function($constraint){
                $constraint->aspectRatio();
            })->save($path.$newfilename);
        }

        $product->save();

        Session::flash('feedback', 'แก้ไขสินค้า ID:'.$product->id.' เรียบร้อย');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if($product != 'nopic.png'){
            Storage::disk('public')->delete('images/'.$product->picture);
            Storage::disk('public')->delete('images/resize/'.$product->picture);
        }
        Session::flash('feedback', 'ลบข้อมูลเรียบร้อย');

        return redirect()->route('product.index');

    }
}

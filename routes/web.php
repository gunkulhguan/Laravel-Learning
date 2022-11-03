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


Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/category/{id}', 'WelcomeController@show')->name('welcome.show');

Route::get('/contact', 'ContactController@index')->name('contact');



    Route::get('/about', function(){
        return view('about');
    })->name("about");


    Auth::routes();//ต้อง login ก่อน ถึงจะเข้า url ด้านล่างได้

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/store', 'CategoryController@store')->name('category.index');
    Route::resource('/product', 'ProductController');
    Route::get('/category/store', 'CategoryController@store')->name('category.index');


    Route::get('/cart', 'CartController@index')->middleware('auth')->name('cart.index');
    Route::get('/cart/{product_id}', 'CartController@store')->middleware('auth')->name('cart.store');
    Route::get('/cart/{product_id}/delete', 'CartController@delete')->middleware('auth')->name('cart.delete');
    Route::get('/cart/checkout/delete', 'CartController@confirm')->middleware('auth')->name('cart.confirm');




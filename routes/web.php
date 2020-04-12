<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/bin');
});

Route::get('/bin', 'ItemController@index')->name('items.index');
Route::get('/bin/{id}', 'ItemController@show')->name('items.show');
Route::post('/bin/item/{id}/claim', 'ItemController@claim');
Route::get('/bin/item/{id}/claim-successful', function ($id) {
    $item = \App\Item::findOrFail($id);

    return view('items.claim-successful', compact('item'));
});

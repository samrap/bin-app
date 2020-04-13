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
    return view('home');
});

Route::get('/bin', 'ItemController@index')->name('items.index');
Route::get('/bin/{id}', 'ItemController@show')->name('items.show');
Route::post('/bin/item/{id}/claim', 'ItemController@claim')->name('claim-item');
Route::get('/bin/item/{id}/claim-successful', function ($id) {
    if (!session()->has('identity')) {
        return redirect()->route('items.show', compact('id'));
    }

    $item = \App\Item::findOrFail($id);

    return view('items.claim-successful', compact('item'));
});
Route::get('/bin/item/{id}/claim-failed', function ($id) {
    $item = \App\Item::findOrFail($id);

    return view('items.claim-failed', compact('item'));
});

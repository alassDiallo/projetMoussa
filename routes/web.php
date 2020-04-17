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
    return redirect()->route('produits.index');
});

Route::get('/a', function () {
    return view('administrateur.app');
});
Route::resource('categorie', 'ControllerCategorie');
Route::get('/recherche','ControllerProduit@recherche')->name('produits.recherche');
Route::resource('produits','ControllerProduit');
Route::get('/payement','ControllerPayement@index')->name('payement.index');
Route::get('commander','controllerCommande@commander')->name('commander');
Route::post('commander',function(){
dd('commander');
});
Route::get('listProduit','ControllerProduit@listProduit')->name('listeProduit');
Route::resource('commande','ControllerCommande');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

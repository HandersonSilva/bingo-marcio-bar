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

use App\Http\Controllers\BingoController;

Route::get('/', 'BingoController@index')->name('index');
//Route::post("/verificaganhador","BingoController@verificaGanhador");
Route::get("/sorteiaNumero","BingoController@sorteiaNumero")->name('sorteianumero');
Route::get("/viewcadCartela","BingoController@viewcadCartela")->name('view_cad_cartela');
Route::post("/addCartela","BingoController@addCartela")->name('addcartela');
Route::get('/premios','PremioController@index')->name('premios');
Route::get('/viewCadPremios','PremioController@viewCadPremios')->name('view-cad-premios');
Route::post('/addPremio','PremioController@addPremio')->name('add-premio');


Route::get("/gerarPdf","BingoController@gerarPdf")->name('gerarPdf');
Route::get("/returnpdf", function (){
    return view('exemplo_pdf');
})->name('returnpdf');

<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/show-nestable', function(Request $request) {
    dd($request->list);
})->name('mynestable');

Route::post('/item_de_atividades/concluded', [App\Http\Controllers\ItemAtividadeController::class, 'conclude'])->name('item_de_atividades.concluded');
Route::post('/lista_de_itens', [App\Http\Controllers\HomeController::class, 'listaAtividade'])->name('lista_de_itens.listaAtividade');

Route::resources([
    "atividades" => App\Http\Controllers\AtividadeController::class,
    "item_de_atividades" => App\Http\Controllers\ItemAtividadeController::class,
    "item_de_item" => App\Http\Controllers\ItemItemController::class
]);

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('produtos', 'ProdutoController');
Route::resource('marcas', 'MarcaController');
Route::resource('sabores', 'SaborController');
Route::resource('unidades', 'UnidadeController');
Route::resource('tipos', 'TipoController');


Route::post('produtos/verify', 'ProdutoController@verify');

Route::post('produtos/bulkDestroy', 'ProdutoController@bulkDestroy');

Route::get('/healthcheck',function(){
    return 'It works!';
});

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/admin', function(){
    return view('plantilla.dashboard');

});
Route::resource('categorias', 'categoriasController');
Route::resource('producto', 'ProductoController');
Route::resource('subcategoria', 'SubcategoriaController');
Route::resource('usuario', 'UsuarioController');


/*Route::get('/','Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');*/

Route::get('/home', 'HomeController@index')->name('home');

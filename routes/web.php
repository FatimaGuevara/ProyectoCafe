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
use App\Categoria;
use App\Subcategoria;

Route::group(['middleware' => ['guest']], function () {
   
    /*Route::get('/', function () {
        return view('principal');
    });*/
    
    Route::get('/', function(){
        $categorias = Categoria::get();
        return view('plantilla.dashboard',compact('categorias'));
    });

    Route::get('/login','Auth\LoginController@showLoginForm')->name('log');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    
    Route::get('/subcategoriaProducto/{id}','SubcategoriaController@enviar')->name('subpro');
    Route::get('/producto/{id}','ProductoController@enviar')->name('pro');
    
    Route::get('/contactanos/{id}', 'SubcategoriaController@mostrar')->name('contac');
    Route::get('/conocenos/{id}', 'SubcategoriaController@ver')->name('cono');
    
    //rutas evento
    Route::get('evento/form','ControllerEvent@form');
    Route::post('evento/create','ControllerEvent@create');
    Route::get('evento/details/{id}','ControllerEvent@details');
    Route::get('evento/index','ControllerEvent@index');
    Route::get('evento/index/{month}','ControllerEvent@index_month');
    Route::post('evento/calendario','ControllerEvent@calendario');

});

Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => ['Administrador']], function () {
          
        Route::resource('categorias', 'categoriasController');
        Route::resource('producto', 'ProductoController');
        Route::resource('subcategoria', 'SubcategoriaController');
        Route::resource('user', 'UserController');

            //rutas evento
        Route::get('evento/form','ControllerEvent@form');
        Route::post('evento/create','ControllerEvent@create');
        Route::get('evento/details/{id}','ControllerEvent@details');
        Route::get('evento/index','ControllerEvent@index');
        Route::get('evento/index/{month}','ControllerEvent@index_month');
        Route::post('evento/calendario','ControllerEvent@calendario');

    });

});
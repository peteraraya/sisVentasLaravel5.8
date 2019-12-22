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

// Usuario no está autenticado
Route::group(['middleware' => ['guest']], function () {

    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});


// Para usuarios autenticados
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => ['Comprador']], function () {

        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::resource('proveedor', 'ProveedorController');
    });

    Route::group(['middleware' => ['Vendedor']], function () {

        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::resource('cliente', 'ClienteController');
    });

    Route::group(['middleware' => ['Administrador']], function () {

        Route::resource('categoria', 'CategoriaController');
        Route::resource('producto', 'ProductoController');
        Route::resource('proveedor', 'ProveedorController');
        Route::resource('cliente', 'ClienteController');
        Route::resource('rol', 'RolController');
        Route::resource('user', 'UserController');
    });
});




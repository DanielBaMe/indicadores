<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Password;

//Login
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('attemptLogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');



Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin', function () { //Vista principal
        return view('admin');
    });

    ////////////////////////////////////////////////////////////////////////////////////////

    //Registros nuevos

    Route::get('/nuevo_usuario', function () { //Crear usuario
        return view('/registros/usuarios');
    });

    Route::get('/unidad', function () { //Crear unidad
        return view('/registros/unidad');
    });

    Route::get('/registrar_carpetas', function () { //Carpetas
        return view('/registros/carpetas');
    });

    Route::get('/registrar_carpetas_procedimentales', function () { //Carpetas Procedimientos
        return view('/registros/carpetasProcedimientos');
    });

    Route::get('/registrar_denuncias', function () { //Denuncias
        return view('/registros/denuncias');
    });

    Route::get('/registrar_detenidos', function () { //Detenidos
        return view('/registros/detenidosCii');
    });

    Route::get('/registrar_imputados', function () { //Imputados
        return view('/registros/imputados');
    });

    Route::get('/registrar_ordenes', function () { //Ordenes
        return view('/registros/ordenes');
    });

    Route::get('/registrar_procedimientos', function () { //Procedimientos
        return view('/registros/procedimientosVinculaciones');
    });

    Route::get('/registrar_victimas', function () { //Victimas
        return view('/registros/victimas');
    });

    Route::get('/registrar_vinculados', function () { //vinculados
        return view('/registros/vinculadosProceso');
    });

    Route::get('/iniciar_registro', function () { //Fecha de registro
        return view('/registros/fechaRegistro');
    });



    ///////////////////////////////////////////////////////////////////////////////////////////

    Route::prefix('dev')->group(function () {

        //Vistas

        Route::get('menu', function () { //Menu para crear nuevos registros
            return view('menuIndicadores');
        });

        Route::get('ver_registros', function () { //Menu de visualizar registros
            return view('menuRegistros');
        });

        Route::get('verRegistro/{id}', 'Api\VerRegistrosController@verTodo');


        /////////////////////////////////////////////////////////////////////////////////////

        //API


        //Carpetas Detenidos
        Route::prefix('carpetas_detenidos')->group(function () {
            Route::get('/', 'Api\CarpetasDetenidosController@index');
            Route::post('/nueva/{id}', 'Api\CarpetasDetenidosController@store');
            Route::post('/editar/{id}', 'Api\CarpetasDetenidosController@update');
            Route::get('/{id}', 'Api\CarpetasDetenidosController@show');
        });

        //Carpetas Procedimientos
        Route::prefix('carpetas_procedimientos')->group(function () {
            Route::get('/', 'Api\CarpetasProcedimientosController@index');
            Route::post('/nueva/{id}', 'Api\CarpetasProcedimientosController@store');
            Route::post('/editar/{id}', 'Api\CarpetasProcedimientosController@update');
            Route::get('/{id}', 'Api\CarpetasProcedimientosController@show');
        });

        //Denuncias
        Route::prefix('denuncias')->group(function () {
            Route::get('/', 'Api\DenunciasController@index');
            Route::post('/nueva/{id}', 'Api\DenunciasController@store');
            Route::post('/editar/{id}', 'Api\DenunciasController@update');
            Route::get('/{id}', 'Api\DenunciasController@show');
        });

        //DetenidosCii
        Route::prefix('detenidos')->group(function () {
            Route::get('/', 'Api\DetenidosCiiController@index');
            Route::post('/nueva/{id}', 'Api\DetenidosCiiController@store');
            Route::post('/editar/{id}', 'Api\DetenidosCiiController@update');
            Route::get('/{id}', 'Api\DetenidosCiiController@show');
        });

        //Imputados
        Route::prefix('imputados')->group(function () {
            Route::get('/', 'Api\ImputadosController@index');
            Route::post('/nueva/{id}', 'Api\ImputadosController@store');
            Route::post('/editar/{id}', 'Api\ImputadosController@update');
            Route::get('/{id}', 'Api\ImputadosController@show');
        });

        //Indicadores
        Route::prefix('indicadores')->group(function () {
            Route::get('/{id}', 'Api\IndicadoresController@index');
            Route::post('/nueva/{id}', 'Api\IndicadoresController@store');
            Route::post('/editar/{id}', 'Api\IndicadoresController@update');
            // Route::get('/{id}', 'Api\IndicadoresController@show');
        });

        //Ordenes
        Route::prefix('ordenes')->group(function () {
            Route::get('/', 'Api\OrdenesController@index');
            Route::post('/nueva/{id}', 'Api\OrdenesController@store');
            Route::post('/editar/{id}', 'Api\OrdenesController@update');
            Route::get('/{id}', 'Api\OrdenesController@show');
        });

        //Procedimientos
        Route::prefix('procedimientos_vinculaciones')->group(function () {
            Route::get('/', 'Api\ProcedimientosVinculacionesController@index');
            Route::post('/nueva/{id}', 'Api\ProcedimientosVinculacionesController@store');
            Route::post('/editar/{id}', 'Api\ProcedimientosVinculacionesController@update');
            Route::get('/{id}', 'Api\ProcedimientosVinculacionesController@show');
        });

        //USUARIO
        Route::prefix('usuario')->group(function () {
            Route::get('/', 'Api\UsuariosController@index');
            Route::post('/nuevo', 'Api\UsuariosController@store');
            Route::post('/modificar/{id}', 'Api\UsuariosController@update');
            Route::post('/modificarclave/{id}', 'Api\UsuariosController@clave');
            Route::delete('/borrar/{id}', 'Api\UsuariosController@destroy');
            Route::post('/modificarPassword/{id}', 'Api\UsuariosController@passwordUpdate');
        });

        //UNIDAD
        Route::prefix('unidad')->group(function () {
            Route::get('/', 'Api\UnidadController@index');
            Route::post('/nueva', 'Api\UnidadController@store');
            Route::post('/editar/{id}', 'Api\UnidadController@update');
            Route::get('/{id}', 'Api\UnidadController@show');
        });

        //Victimas
        Route::prefix('victimas')->group(function () {
            Route::get('/', 'Api\VictimasController@index');
            Route::post('/nueva/{id}', 'Api\VictimasController@store');
            Route::post('/editar/{id}', 'Api\VictimasController@update');
            Route::get('/{id}', 'Api\VictimasController@show');
        });

        //Vinculados
        Route::prefix('vinculados_proceso')->group(function () {
            Route::get('/', 'Api\VinculadosProcesoController@index');
            Route::post('/nueva/{id}', 'Api\VinculadosProcesoController@store');
            Route::post('/editar/{id}', 'Api\VinculadosProcesoController@update');
            Route::get('/{id}', 'Api\VinculadosProcesoController@show');
        });






        //Graficas
        Route::get('grafica/{id}', 'Api\VerRegistrosController@graficar');
    });

    // Route::get('/admin/{path?}', function(){
    //     return View::make('admin');
    //  }) -> where('path', '.*');
});

    


// Route::get('/{path?}', function ($path = null) {
//     return View::main('main');
// }) -> where('path', '.*');

//Auth::routes();

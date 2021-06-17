<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, x-requested-with,  x-csrf-token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: *');

Route::middleware('api')->group(function () {
    // return $request->user();
    Route::get('/token', function () {
        return csrf_token(); 
    });
    
    Route::get('/listeVols', 'VolController@index');
    Route::get('/listeVols/{id}', 'VolController@chercher');
    Route::post('/ouvrirVol', 'VolController@create');
    Route::put('/update/{id}', 'VolController@update');
    Route::put('/fermerVol/{id}', 'VolController@fermer');
    
    Route::post('/creerA', 'AeroportController@create');
    Route::get('/listeA', 'AeroportController@index');
    Route::get('/findAirport/{nom}', 'AeroportController@airportByName');
    Route::get('/findAirportId/{id}', 'AeroportController@airportById');
    
    Route::post('/creerEscale', 'EscaleController@create');
    
    Route::get('/listeReserv', 'ReservationController@index');
    Route::post('/creerReserv', 'ReservationController@create');
    Route::put('/updateReserv/{id}', 'ReservationController@update');
    Route::put('/confirmerReserv/{id}', 'ReservationController@confirmer');
    Route::put('/annulerReserv/{id}', 'ReservationController@annuler');
    
    Route::post('/creerClient', 'ClientController@create');
    
    Route::post('/creerPass', 'PassagerController@create');
});


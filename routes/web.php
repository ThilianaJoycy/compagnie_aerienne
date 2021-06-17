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

// Route::get('{any}', function () {
//     return view('layout/app');
// })->where('any', '.*');


Route::get('/', function () {
    return view('layout/app');
});

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
Route::get('/listeReserv/{id}', 'ReservationController@index');
Route::post('/creerReserv', 'ReservationController@create');
Route::put('/updateReserv/{id}', 'ReservationController@update');
Route::put('/confirmerReserv/{id}', 'ReservationController@confirmer');
Route::put('/annulerReserv/{id}', 'ReservationController@annuler');

Route::post('/creerClient', 'ClientController@create');
Route::get('/client/{email}', 'ClientController@clientByEmail');

Route::post('/creerPass', 'PassagerController@create');
Route::get('/pass/{nom}', 'PassagerController@passagerByNom');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

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
    return view('home');
});

Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'index']);

Route::post('/clients/{id}/deliveries', [App\Http\Controllers\DeliveriesController::class, 'getByClientID']);

Route::get('/api/addresses/{id}', [App\Http\Controllers\AddressesController::class, 'getByClientID']);

Route::get('/delivery_types', [App\Http\Controllers\AddressesController::class, 'getAddressesWithMultipleDeliveryTypes']);

Route::get('/inactive_clients', [App\Http\Controllers\AddressesController::class, 'inactiveAddresses']);

Route::get('/last_deliveries', [App\Http\Controllers\AddressesController::class, 'addressLastDeliveries']);

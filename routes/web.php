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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->resource('driverr', 'DriverController');
Route::middleware('auth')->resource('transportt', 'TransportController');


Route::middleware('auth')->get('/api/transport', function () {
    $transports = [];

    foreach (\App\Transport::all() as $transport) {
        $transports[] = [
            'id'     => $transport->id,
            'brand'  => $transport->brand,
            'status'  => $transport->status ? $transport->status->name : 'none',
            'type'    => $transport->type ? $transport->status->type : 'none',
        ];
    }

    return Response::json([
        'success'  => true,
        'response' => $transports
    ]);
});

Route::middleware('auth')->get('/api/transport/{id}', function (int $id) {
    $transport = \App\Transport::find($id);

    if (!$transport) {
        return Response::json([
            'success' => false,
            'error'   => [
                'code'    => 1,
                'message' => 'Транспорт не найден'
            ]
        ], 404);
    }

    return Response::json([
        'success'  => true,
        'response' => [
            'id'      => $transport->id,
            'brand'   => $transport->brand,
            'status'  => $transport->status ? $transport->status->name : 'none',
            'type'    => $transport->type ? $transport->type->name : 'none',
            'mileage' => $transport->mileage,
            'driver'  => $transport->driver
        ]
    ]);
});
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

Route::get('/transport/all', function () {
    $transports = [];

    foreach (\App\Transport::all() as $transport) {

        $transports[] = [
            'brand'  => $transport->brand,
            'status' => $transport->status,
            'type'   => $transport->type,
            'driver' => [
                'name'       => $transport->driver->name,
                'birth_date' => $transport->driver->birthDate
            ]
        ];
    }

    return Response::json($transports);
});

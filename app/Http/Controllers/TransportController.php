<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Transport;
use App\TransportStatus;
use App\TransportType;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var array $transports */
        $transports = Transport::all();

        return view('transports.index', ['transports' => compact('transports')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        $transports = Transport::all();
        $statuses = TransportStatus::all();
        $types = TransportType::all();

        //dd($drivers);

        return view('transports.create', [
            'drivers'  => $drivers,
            'transports'=>$transports,
            'statuses' => $statuses,
            'types'    => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand'   => 'required',
            'mileage' => 'required|int',
            'driver_id' => 'required|int',
            'status_id' => 'required|int',
            'type_id' => 'required|int',
        ]);
        $transport = new Transport([
            'brand'   => $request->get('brand'),
            'mileage' => $request->get('mileage'),
            'driver_id' => $request->get('driver_id'),
            'status_id' => $request->get('status_id'),
            'type_id' => $request->get('type_id'),
        ]);

        $transport->save();

        return redirect()
            ->route('transportt.index')
            ->with('success', 'Транспорт добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transport = Transport::find($id);
        $drivers = Driver::all();
        $statuses = TransportStatus::all();
        $types = TransportType::all();

        //dd($drivers);

        return view('transports.edit', [
            'transport'=>$transport,
            'drivers'  => $drivers,
            'statuses' => $statuses,
            'types'    => $types
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand'     => 'required',
            'mileage'   => 'required|int',
            'driver_id' => 'required|int',
            'type_id'   => 'required|int',
            'status_id' => 'required|int',
        ]);

        $transport = Transport::find($id);
        $transport->brand = $request->get('brand');
        $transport->mileage = $request->get('mileage');
        $transport->driver_id = $request->get('driver_id');
        $transport->status_id = $request->get('status_id');
        $transport->type_id = $request->get('type_id');
        $transport->save();

        return redirect('/transportt')->with('success', 'Информация об автомобиле была изменена успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transport::find($id);
        $transport->delete();

        return redirect('/transportt')->with('success', 'Автомобиль был удалён успешно');
    }
}

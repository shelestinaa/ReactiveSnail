<?php

namespace App\Http\Controllers;

use App\Transport;
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
        return view('transports.create');
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
            'mileage' => 'required|date',
        ]);
        $transport = new Transport([
            'brand'   => $request->get('brand'),
            'mileage' => $request->get('mileage'),
        ]);

        $transport->save();

        return redirect('/transports', 'success', 'Автомобиль успешно добавлен');
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

        return view('/transports/edit', compact('transport'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use PhpParser\Node\Expr\Array_;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** @var array $drivers */
        $drivers = Driver::all();

        return view('drivers.index',['drivers'=>compact('drivers')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
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
            'name'       => 'required',
            'birth_date' => 'required|date',
        ]);
        $driver = new Driver([
            'name'       => $request->get('name'),
            'birth_date' => $request->get('birth_date'),
        ]);

        $driver->save();

        return redirect('/drivers', 'success', 'Водитель успешно добавлен');
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
        $driver = Driver::find($id);

        return view('/drivers/edit', compact('driver'));
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
            'name'=>'required',
            'birth_date'=> 'required|date',
        ]);

        $driver = Driver::find($id);
        $driver->name = $request->get('name');
        $driver->birth_date = $request->get('birth_date');
        $driver->save();

        return redirect('/driverr')->with('success', 'Информация о водителе была изменена успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();

        return redirect('/driverr')->with('success', 'Водитель был удалён успешно');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['brand', 'mileage', 'driver_id', 'type_id', 'status_id'];

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    public function type()
    {
        return $this->belongsTo('App\TransportType', 'type_id');
    }

    public function status()
    {
        return $this->belongsTo('App\TransportStatus', 'status_id');
    }
}

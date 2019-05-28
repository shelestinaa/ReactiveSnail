<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    public function type()
    {
        return$this->belongsTo('App\TransportType', 'type_id');
    }

    public function status()
    {
        return $this->belongsTo('App\TransportStatus', 'status_id');
    }
}

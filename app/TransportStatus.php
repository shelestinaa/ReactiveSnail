<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportStatus extends Model
{
    protected $table = 'transport_status';

    public function transport()
    {
        return $this->hasMany('App\Transport');
    }
}

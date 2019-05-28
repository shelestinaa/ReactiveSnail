<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Transport;

class Driver extends Model
{
//    /**
//     * @var int $id ID
//     */
//    public $id;
//
//    /**
//     * @var string $name Name
//     */
//    public $name;
//
//    /**
//     * @var \DateTimeImmutable $birthDate Birth date
//     */
//    public $birthDate;
//
//    public $createdAt;
//
//    public $updatedAt;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transport()
    {
        return $this->hasOne('App\Transport');
    }
}

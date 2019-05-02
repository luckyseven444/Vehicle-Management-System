<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigndriver extends Model
{
    protected $table = 'assign_driver';
    protected $primaryKey = 'id';
    protected $fillable = [
        'driver_id',
        'vehicle_id',
    ];

    public function drivers()
    {
        return $this->belongsTo('App\Driver', 'driver_id', 'id');
    }

    public function vehicles()
    {
        return $this->belongsTo('App\AddVehicle', 'vehicle_id', 'id');
    }


}

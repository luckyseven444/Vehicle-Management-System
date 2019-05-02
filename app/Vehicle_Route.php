<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Route extends Model
{
    protected $table = 'vehicle_and_route';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'route_id',

    ];

    public function vehicles()
    {
        return $this->belongsTo('App\AddVehicle', 'vehicle_id', 'id');
    }

    public function routes()
    {
        return $this->belongsTo('App\Route', 'route_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleSeat extends Model
{
    protected $table = 'vehicle_seats';
    protected $primaryKey ='id';
    use SoftDeletes;
    protected $fillable = [
        'reg_number',
        'seat_number',

    ];


    /*public  function addVehicle()
    {
        return $this->hasMany('App\AddVehicle', 'reg_number', 'id');
    }
    public  function addVehicle2()
    {
        return $this->hasMany('App\AddVehicle', 'seat_number', 'id');
    }*/

}

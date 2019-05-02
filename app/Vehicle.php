<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vehicle extends Model
{
    use SoftDeletes;
    protected $table = 'vehicles';
    protected $primaryKey ='id';
   
    protected $fillable = [
        'vehicle_type',
        'status'       
    ];
//    public function addVehicle()
//    {
//        return $this->hasMany('App\AddVehicle', 'vehicle_type','id');
//    }
}

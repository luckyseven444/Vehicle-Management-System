<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AddVehicle extends Model
{
    protected $table = 'add_vehicles';
    protected $primaryKey ='id';
    use SoftDeletes;

    protected $fillable = [
        'model_no',
        'registration_no',
        'chassis_no',
        'engine_no',
        'vehicle_type',
        'number_of_seat',
        'owner',

    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_type', 'vehicle_type');
    }

    public function seats()
    {
        return $this->hasMany('App\Seat', 'vehicle_id', 'id');
    }

}

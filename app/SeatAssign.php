<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatAssign extends Model
{
    protected $table = 'seat_assign';
    protected $primaryKey = 'id';
    protected $fillable = [
        'route_id',
        'vehicle_id',
        'employee_id',
        'seat_id',
    ];


    public function routes()
    {
        return $this->belongsTo('App\Route', 'route_id', 'id');
    }
    public function vehicles()
    {
        return $this->belongsTo('App\AddVehicle', 'vehicle_id', 'id');
    }
    public function seats()
    {
        return $this->belongsTo('App\Seat', 'seat_id', 'id');
    }

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }

}

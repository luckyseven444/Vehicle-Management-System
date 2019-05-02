<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivateVehicle extends Model
{
    use SoftDeletes;
    protected $table = 'private_vehicle';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'vehicle_id'
        
    ];

    protected $dates = ['deleted_at'];

    

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }
    public function vehicles()
    {
        return $this->belongsTo('App\AddVehicle', 'vehicle_id', 'id');
    }

    // public function assignedDrivers()
    // {
    //     return $this->belongsTo('App\Assigndriver', 'vehicle_id', 'vehicle_id');
    // }
}

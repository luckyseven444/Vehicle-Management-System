<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    protected $table = 'seats';
    protected $primaryKey ='id';
    use SoftDeletes;
    protected $fillable = [
        'vehicle_id',
        'seat_number',
    ];

    public function seat_assigns()
    {
        return $this->belongsTo('App\SeatAssign', 'vehicle_id', 'id');
    }

}

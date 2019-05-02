<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fitness extends Model
{
    use SoftDeletes;
    protected $table = 'fitnesses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_number',
        'last_fitness_check',
        'next_fitness_check',
        'fitness_description',
        'fitness_certificate',
        'status',
        'created_at',
        'updated_at',
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\AddVehicle', 'vehicle_number', 'id');
    }
}

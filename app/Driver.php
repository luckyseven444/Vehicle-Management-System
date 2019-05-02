<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $table = 'driver';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',

        'join_date',
        'address',
        'manager',
        'created_at',
        'updated_at',
        'driver_image',
    ];

    //public function departments()
    //{
        //return $this->belongsTo('App\Department', 'department', 'id');
    //}
}

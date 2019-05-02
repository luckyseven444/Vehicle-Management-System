<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stoppage extends Model
{
    use SoftDeletes;
    protected $table = 'stoppages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'route_id',
        'location_id',
        'created_at',
        'updated_at',
    ];

    public  function stoppage()
    {
        return $this->hasMany('App\Route', 'route_id', 'id');
    }
    public  function location()
    {
        return $this->hasMany('App\Location', 'location_id', 'id');
    }


}

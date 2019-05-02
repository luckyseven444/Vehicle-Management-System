<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;
    protected $table = 'routes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'route_name',
        'start_location',
        'end_location',
        'created_at',
        'updated_at',
    ];

/*//    public function route()
    {

        return $this->belongsTo('App\Location', 'start_location', 'id');
    }*/
    public function startLocation()
    {

        return $this->belongsTo('App\Location', 'start_location', 'id');
    }
    public function endLocation()
    {

        return $this->belongsTo('App\Location', 'end_location', 'id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'location',
        'created_at',
        'updated_at',
    ];
}

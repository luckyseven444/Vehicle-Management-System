<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',
        'department',
        'join_date',
        'address',
        'manager',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'join_date',
        'created_at',
        'updated_at',
    ];


    public function departments()
    {
        return $this->belongsTo('App\Department', 'department', 'id');
    }
}

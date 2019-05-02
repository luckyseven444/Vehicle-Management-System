<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $table = 'department';
    protected $primaryKey = 'id';
    protected $fillable = [
        'department_name',
        'created_at',
        'updated_at',
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee', 'department_id');
    }

}

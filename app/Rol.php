<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    public $table='roles';
    protected $fillable=['nombre'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

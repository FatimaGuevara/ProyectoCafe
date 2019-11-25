<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public $table='usuarios';
    protected $fillable = [
        'nombre', 'email', 'password', 'rol_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->hasMany('App\Rol');
    }
}

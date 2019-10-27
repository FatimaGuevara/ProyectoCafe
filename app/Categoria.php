<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = "categorias";

    public function subcategoria()
    {
        return $this->hasMany('App\Subcategoria');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
}

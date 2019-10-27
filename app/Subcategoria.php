<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    public $table = "subcategorias";

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}

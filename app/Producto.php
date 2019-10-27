<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = "productos";
    protected $fillable = ['subcategoria_id','nombre','precio','descripcion','imagen'];

    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }

}

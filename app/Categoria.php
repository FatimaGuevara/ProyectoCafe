<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function subcategoria()
    {
        return $this->hasMany('App\Subcategoria');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $table = "eventos";

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $table = "eventos";
    protected $fillable = [
        'fecha', 'hora_inicio', 'hora_fin', 'nombre', 'descripcion',
    ];

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }
}

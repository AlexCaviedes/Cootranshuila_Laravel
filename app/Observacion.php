<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = "observaciones";

    protected $fillable = ['Observaciones','Fecha', 'users_id','equipos_id'];

    public function Equipo(){
        
        return $this->belongsTo('App\Equipo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "equipos";

    protected $fillable = [
        'Cantidad','CodigoQR','Fecha','Ubicacion',
        'referencias_id','users_id','categorias_id'
    ];

    public function observaciones(){

        return $this->hasMany('App\Observacion','equipos_id');
    }

    public function referencias(){

        return $this->belongsTo('App\Referencia');
        
    }

    public function categorias(){

        return $this->belongsTo('App\Categoria');

    }

    public function users(){

        return $this->belongsTo('App\User');

    }
}

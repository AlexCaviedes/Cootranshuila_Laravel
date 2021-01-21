<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = 'referencias';

    protected $fillable = ['Referencia','Marca', 'Estado'];

    public function equipos(){

        return $this->hasMany('App\Equipo','referencias_id');

    }
}

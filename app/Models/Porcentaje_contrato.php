<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Porcentaje_contrato extends Model
{
    protected $table = 'procentaje_contratos';

    protected $fillable =[
        'total', 'consignado', 'user_id'
    ];
}

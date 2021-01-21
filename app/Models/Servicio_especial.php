<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio_especial extends Model
{
    protected $table = 'servicio_especial';

    protected $fillable = [
        'contratoNumeroUno', 'contratoAno', 'contratoEmpresa', 'contratoNit1', 'contratoNit2', 'contratoContratante', 'contratoNit3', 'contratoNit4', 'contratoObjetivo', 'contratoOrigen', 'contratoDestino', 'contratoRecorrido', 'contratoValor', 'PagoForma', 'contratoHoraSalida', 'contratoPasajeros', 'contratoConvenio', 'contratoConsorcio', 'contratoUnion', 'contratoCon', 'contratoDiaInicio', 'contratoMesInicio', 'contratoAnoInicio', 'contratoDiaFin', 'contratoMesFin', 'contratoAnoFin', 'contratoCarateVehiculo', 'contratoPlaca', 'contratoModelo', 'contratoMarca', 'contratoClase', 'contratoNumeroInterno', 'contratoTarOperacion', 'contratoConduc1Nombre', 'contratoConduc1Cedula', 'contratoConduc1Licencia', 'contratoConduc1Vigencia', 'contratoConduc2Nombre', 'contratoConduc2Cedula', 'contratoConduc2Licencia', 'contratoConduc2Vigencia', 'contratoConduc3Nombre', 'contratoConduc3Cedula', 'contratoConduc3Licencia', 'contratoConduc3Vigencia', 'contratoRespoNombre', 'contratoRespoCedula', 'contratoRespoDireccion', 'contratoRespoTelefono', 'contratoObservaciones', 'contratoFechaRealizado', 'contratoValorLetra', 'codeQR', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}

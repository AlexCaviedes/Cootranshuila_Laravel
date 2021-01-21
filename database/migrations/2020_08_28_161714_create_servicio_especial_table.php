<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioEspecialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_especial', function (Blueprint $table) {
            $table->id();

            $table->integer('contratoNumeroUno');
            $table->integer('contratoAno');
            $table->string('contratoEmpresa', 70);
            $table->integer('contratoNit1');
            $table->integer('contratoNit2');
            $table->string('contratoContratante', 150);
            $table->integer('contratoNit3');
            $table->integer('contratoNit4')->nullable();
            $table->longText('contratoObjetivo')->nullable();
            $table->string('contratoOrigen', 15);
            $table->string('contratoDestino', 15);
            $table->longText('contratoRecorrido');
            $table->integer('contratoValor');
            $table->string('PagoForma', 10);
            $table->string('contratoHoraSalida', 10);
            $table->integer('contratoPasajeros');
            $table->string('contratoConvenio', 40)->nullable();
            $table->string('contratoConsorcio', 40)->nullable();
            $table->string('contratoUnion', 40)->nullable();
            $table->string('contratoCon', 40)->nullable();
            $table->string('contratoDiaInicio', 20);
            $table->string('contratoMesInicio', 20);
            $table->string('contratoAnoInicio', 20);
            $table->string('contratoDiaFin', 20);
            $table->string('contratoMesFin', 20);
            $table->string('contratoAnoFin', 20);
            $table->longText('contratoCarateVehiculo');
            $table->string('contratoPlaca', 10);
            $table->string('contratoModelo', 20);
            $table->string('contratoMarca', 20);
            $table->string('contratoClase', 20);
            $table->integer('contratoNumeroInterno');
            $table->integer('contratoTarOperacion');
            $table->string('contratoConduc1Nombre', 200);
            $table->integer('contratoConduc1Cedula');
            $table->string('contratoConduc1Licencia', 20);
            $table->date('contratoConduc1Vigencia');
            $table->string('contratoConduc2Nombre', 200)->nullable();
            $table->integer('contratoConduc2Cedula')->nullable();
            $table->string('contratoConduc2Licencia', 20)->nullable();
            $table->date('contratoConduc2Vigencia')->nullable();
            $table->string('contratoConduc3Nombre', 200)->nullable();
            $table->integer('contratoConduc3Cedula')->nullable();
            $table->string('contratoConduc3Licencia', 20)->nullable();
            $table->date('contratoConduc3Vigencia')->nullable();
            $table->string('contratoRespoNombre', 200);
            $table->integer('contratoRespoCedula');
            $table->string('contratoRespoDireccion', 100);
            $table->string('contratoRespoTelefono', 20);
            $table->longText('contratoObservaciones')->nullable();
            $table->dateTime('contratoFechaRealizado');
            $table->string('contratoValorLetra', 200);
            $table->string('codeQR');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_especial');
    }
}









				
			
		
				
				
			
					
			
				
					
				
				
				
			
				
				
				
				
				
				
				
		
				
				
				
				
				
				
				
				
			
			
					
			
				
				
					
			
				
				
				
				
				
				
				
				
				
				
				
			

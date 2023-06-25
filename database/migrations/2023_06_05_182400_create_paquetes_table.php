<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RECEPCION_paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_de_guia');
            $table->string('paqueteria');
            $table->string('quien_captura');
            $table->string('usuario'); // Destinatario
            $table->string('correo');
            $table->string('area');
            $table->string('extension')->nullable();
            $table->string('empleado_recibe')->nullable();
            $table->datetime('fecha_entregado')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('paquetes');
    }
};

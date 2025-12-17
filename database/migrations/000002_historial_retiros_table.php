<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_retiros', function (Blueprint $table) {
            $table->id();

            // Relación con usuarios
            $table->unsignedBigInteger('usuario_id');

            // Datos del retiro
            $table->decimal('monto_retiro', 12, 2);
            $table->dateTime('fecha_retiro');

            $table->timestamps();

            // Llave foránea
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_retiros');
    }
};

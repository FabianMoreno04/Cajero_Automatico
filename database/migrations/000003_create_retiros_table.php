<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retiros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')
                  ->constrained('usuarios')
                  ->onDelete('cascade');
            $table->decimal('monto', 12, 2);
            $table->timestamp('fecha_retiro');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retiros');
    }
};

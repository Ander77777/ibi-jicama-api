<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {

            $table->id();
            $table->foreignId('empleado_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->enum('turno', [
                'Matutino',
                'Vespertino',
                'Nocturno'
            ]);
            $table->string('actividad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {

            $table->id();
            $table->foreignId('empleado_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('invernadero_id')
                ->constrained('invernaderos')
                ->onDelete('cascade');
            $table->foreignId('cultivo_id')
                ->constrained('cultivos')
                ->onDelete('cascade');

            $table->string('actividad');
            $table->enum('estado', [
                'Pendiente',
                'En progreso',
                'Completado'
            ])->default('Pendiente');

            $table->decimal('progreso', 5, 2)
                ->default(0.00);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};

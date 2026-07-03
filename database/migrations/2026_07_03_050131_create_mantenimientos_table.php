<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('mantenimientos', function (Blueprint $table) {

        $table->id();

        $table->string('titulo');

        $table->text('descripcion');

        $table->enum('tipo', [
            'Preventivo',
            'Correctivo'
        ]);

        $table->enum('estado', [
            'Pendiente',
            'En proceso',
            'Completado'
        ])->default('Pendiente');

        $table->foreignId('invernadero_id')
            ->constrained('invernaderos')
            ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};

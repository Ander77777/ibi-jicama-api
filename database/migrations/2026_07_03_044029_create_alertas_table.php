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
    Schema::create('alertas', function (Blueprint $table) {

        $table->id();

        $table->string('titulo');

        $table->text('descripcion');

        $table->enum('severidad',[
            'Alta',
            'Media',
            'Baja'
        ]);

        $table->enum('estado',[
            'Abierto',
            'En proceso',
            'Resuelto'
        ]);

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
        Schema::dropIfExists('alertas');
    }
};

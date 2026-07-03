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
    Schema::create('producciones', function (Blueprint $table) {

        $table->id();

        $table->foreignId('invernadero_id')
            ->constrained('invernaderos')
            ->cascadeOnDelete();

        $table->foreignId('cama_id')
            ->constrained('camas')
            ->cascadeOnDelete();

        $table->foreignId('cultivo_id')
            ->constrained('cultivos')
            ->cascadeOnDelete();

        $table->foreignId('encargado_id')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->decimal('produccionKg',8,2);

        $table->enum('estado',[
            'Estable',
            'Advertencia',
            'Critico'
        ]);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};

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
       Schema::create('equipos', function (Blueprint $table) {
        $table->id();
        $table->string('marca');
        $table->string('nombre');
        $table->string('numero_serie')->unique();
        $table->string('categoria');
        $table->enum('estado', ['en uso', 'libre', 'reparacion', 'dado_de_baja'])->default('en uso');
        $table->softDeletes();
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
 
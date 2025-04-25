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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id()->startingValue(1819);
            $table->enum('emergencia', ['si', 'no']);
            $table->integer('ticket')->nullable();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->string('inicio');
            $table->string('fin')->nullable();
            $table->enum('estado', ['en proceso', 'terminado', 'valorizado'])->default('en proceso');
            $table->string('archivo')->nullable();
            $table->enum('valorizado', ['si', 'no'])->default('no');
            $table->string('cotizacion')->nullable();
            $table->enum('actividad_interna', ['si', 'no']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};

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
        Schema::create('compras', function (Blueprint $table) {
            $table->id()->startingValue(4907);
            $table->foreignId('proveedor_id')->constrained('provedores')->onDelete('cascade');
            $table->foreignId('material_id')->constrained('materiales')->onDelete('cascade');
            $table->float('cantidad',11,2);
            $table->foreignId('medida_id')->constrained('medidas')->onDelete('cascade');
            $table->integer('valor_unitario');
            $table->string('fecha_compra')->nullable();
            $table->integer('factura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

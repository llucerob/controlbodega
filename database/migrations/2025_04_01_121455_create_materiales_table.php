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
        Schema::create('materiales', function (Blueprint $table) {
            $table->id()->startingValue(1250);
            $table->string('nombre');
            $table->integer('valor_unitario')->default('0');
            $table->string('marca');
            $table->float('cantidad',11,1)->default('0');
            $table->foreignId('medida')->constrained('medidas')->onDelete('cascade');
            $table->string('min_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};

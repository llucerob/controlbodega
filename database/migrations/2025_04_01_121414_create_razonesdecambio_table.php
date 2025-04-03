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
        Schema::create('razonesdecambio', function (Blueprint $table) {
            $table->id();
            $table->float('cantidad',11,1);
            $table->foreignId('medida1')->constrained('medidas')->onDelete('cascade');
            $table->float('cantidad2',11,1);
            $table->foreignId('medida2')->constrained('medidas')->onDelete('cascade');
            $table->string('razon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razonesdecambio');
    }
};

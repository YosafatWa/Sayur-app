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
        Schema::create('vegetables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps(); // Akan mengambil dua column_at (auto terisi tanggal dan waktu) dan updated_at (auto terisi tanggal dan waktu)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vegetables');
    }
};

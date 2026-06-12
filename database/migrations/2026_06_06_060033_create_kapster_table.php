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
        Schema::create('kapster', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('keahlian'); // KITA SUNTIKKAN KOLOM KEAHLIAN YANG HILANG DI SINI
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapster');
    }
};
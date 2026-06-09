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
        // Menambahkan kolom foto ke tabel kapster setelah kolom status
        Schema::table('kapster', function (Blueprint $table) {
            $table->string('foto')->nullable();
        });

        // Menambahkan kolom foto ke tabel layanan setelah kolom harga
        Schema::table('layanan', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kapster', function (Blueprint $table) {
            $table->dropColumn('foto');
        });

        Schema::table('layanan', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
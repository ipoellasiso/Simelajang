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
        Schema::create('tb_lpj', function (Blueprint $table) {
            $table->id();
            $table->string('id_sp2d');
            $table->string('nama_tujuan');
            $table->decimal('npwp');
            $table->string('nomor_npd');
            $table->string('tanggal_tbp');
            $table->string('nama_pa_kpa');
            $table->string('nip_pa_kpa');
            $table->string('jabatan_pa_kpa');
            $table->string('nama_bp_bpp');
            $table->string('nip_bp_bpp');
            $table->string('jabatan_bp_bpp');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_lpj');
    }
};

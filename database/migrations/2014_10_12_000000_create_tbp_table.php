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
        Schema::create('tb_tbp', function (Blueprint $table) {
            $table->id();
            $table->string('id_sp2d');
            $table->string('nomor_tbp');
            $table->decimal('nilai_tbp');
            $table->string('keterangan_tbp');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tbp');
    }
};

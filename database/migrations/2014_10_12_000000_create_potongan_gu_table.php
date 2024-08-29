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
        Schema::create('tb_potongangu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pajak_potongan');
            $table->string('id_billing');
            $table->decimal('nilai_tbp_pajak_potongan');
            $table->string('id_sp2d');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_potongangu');
    }
};

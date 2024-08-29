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
        Schema::create('sp2d_gu', function (Blueprint $table) {
            $table->id();
            $table->string('akun_pajak');
            $table->string('id_spm');
            $table->string('nomor_spm');
            $table->string('id_spp');
            $table->string('nomor_spp');
            $table->string('tahun');
            $table->string('id_daerah');
            $table->string('id_unit');
            $table->string('id_skpd');
            $table->string('id_sub_skpd');
            $table->string('kode_sub_skpd');
            $table->string('nama_sub_skpd');
            $table->string('nilai_spm');
            $table->date('tanggal_spm');
            $table->string('keterangan_spm');
            $table->string('is_verifikasi_spm');
            $table->string('verifikasi_spm_by');
            $table->string('verifikasi_spm_at');
            $table->string('keterangan_verifikasi_spm');
            $table->string('jenis_spm');
            $table->string('jenis_ls_spm');
            $table->string('is_kunci_rekening_spm');
            $table->string('is_sptjm_spm');
            $table->string('is_status_perubahan');
            $table->string('status_perubahan_at');
            $table->string('status_perubahan_by');
            $table->string('id_jadwal');
            $table->string('id_tahap');
            $table->string('status_tahap');
            $table->string('kode_tahap');
            $table->string('created_at');
            $table->string('created_by');
            $table->string('updated_at');
            $table->string('updated_by');
            $table->string('deleted_at');
            $table->string('deleted_by');
            $table->string('bulan_gaji');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp2d_gu');
    }
};

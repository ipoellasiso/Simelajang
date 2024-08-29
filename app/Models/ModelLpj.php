<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLpj extends Model
{
    protected $table = "tb_lpj";
    protected $primaryKey = "id";
    protected $fillable = [
            'id_tbp',
            'id_sp2d',
            'nama_tujuan',
            'npwp',
            'nomor_npd',
            'tanggal_tbp',
            'nama_pa_kpa',
            'nip_pa_kpa',
            'jabatan_pa_kpa',
            'nama_bp_bpp',
            'nip_bp_bpp',
            'jabatan_bp_bpp'
    ];
}

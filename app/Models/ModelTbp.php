<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTbp extends Model
{
    protected $table = "tb_tbp";
    protected $primaryKey = "id";
    protected $fillable = [
            'id_tbp',
            'id_sp2d',
            'nomor_tbp',
            'nilai_tbp',
            'keterangan_tbp'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispajak extends Model
{
    protected $table = "tb_jenis_pajak";
    protected $primaryKey = "id";
    protected $fillable = [
        'akun_pajak',
        'id_akun_pajak'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akunpajak extends Model
{
    protected $table = "tb_akun_pajak";
    protected $primaryKey = "id";
    protected $fillable = [
        'akun_pajak'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Use Illuminate\Foundation\Auth\User as Model;

class Pajakkpp extends Model
{
    
    protected $table = "pajakkpp";
    protected $primaryKey = "id";
    protected $fillable = [
        'ebilling',
        'ntpn',
        'akun_pajak',
        'jenis_pajak',
        'nilai_pajak',
        'created_at',
        'updated_at',
    ];
}

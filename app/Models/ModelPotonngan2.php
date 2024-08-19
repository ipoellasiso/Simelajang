<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPotonngan2 extends Model
{
    protected $table = "potongan2";
    protected $primaryKey = "id";
    protected $fillable = [
            'id_potongan',
            'jenis_pajak',
            'nilai_pajak',
            'ebilling',
            'status1'
    ];
}

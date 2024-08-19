<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBelanja1 extends Model
{
    protected $table = "belanja1";
    protected $primaryKey = "id";
    protected $fillable = [
            'norekening',
            'uraian',
            'nilai',
            'id_sp2d'
    ];
}

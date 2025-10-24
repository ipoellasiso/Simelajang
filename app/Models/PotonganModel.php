<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganModel extends Model
{
    use HasFactory;
    protected $table = "potongan2";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_potongan',
        'jenis_pajak',
        'nilai_pajak',
        'status1',
        'id_pajakkpp',
        'ebilling',
        'created_at',
        'updated_at',
        'qty'
    ];

    public function sp2d()
    {
        return $this->belongsTo(Sp2dModel::class, 'id_potongan', 'idhalaman');
    }

    public function pajakkpp()
    {
        return $this->hasOne(PajaklsModel::class, 'id_potonganls', 'id');
    }

}

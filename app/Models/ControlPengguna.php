<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPengguna extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'gambar',
        'verify_key',
        'role',
        'id_opd'
    ];
}

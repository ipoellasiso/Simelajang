<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
Use Illuminate\Foundation\Auth\User as Model;

class Pajakpot extends Model
{
    
    protected $table = "potongan2";
    protected $primaryKey = "id";
    protected $fillable = [
        'status1',
        
    ];
}

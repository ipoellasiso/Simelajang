<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokensipd extends Model
{
    public $timestamps = false;
    protected $table = "token";
    protected $primaryKey = "id";
    // protected $fillable = [
    //     'token_sipd',
    //     'id'    
    // ];
    protected $allowedFields = [
        'id',
        'token_sipd'
    ];

    // function getToken($id)
    // {
    //     $builder = DB::table('token')->where('id', $id);
    //     // $data = $builder->where('id', $id);
    //     return $builder;
    // }

}

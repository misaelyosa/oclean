<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanProduk extends Model
{
    use HasFactory;
    protected $table = 'catatanproduk'; 

    protected $fillable = [
        'berat',
        'detail',
        'id_user'
    ];

    public function Peternak(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

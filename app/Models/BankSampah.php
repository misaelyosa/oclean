<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;
    protected $table = 'BankSampah'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'totalSampah',
        'admin',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'admin', 'id');
    }

    public function ekosistems(){
        return $this->belongsTo(Ekosistem::class, 'id_lokasi', 'id');
    }

    public function produks(){
        return $this->hasMany(Produk::class, 'bank', 'id');
    }

    public function TransaksiSampah(){
        return $this->hasMany(TransaksiSampah::class, 'id_bnksmph', 'id');
    }

    public function TransaksiProduk(){
        return $this->hasMany(TransaksiProduk::class, 'id_user', 'id');
    }
}

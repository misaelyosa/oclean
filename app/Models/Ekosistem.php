<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekosistem extends Model
{
    use HasFactory;
    protected $table = 'ekosistems';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rt_rw_kec_kota',
        'detail',
    ];

    public function users(){
        return $this->hasMany(User::class, 'admin', 'id');
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

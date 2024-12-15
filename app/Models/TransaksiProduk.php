<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduk extends Model
{
    use HasFactory;
    protected $table = 'TransaksiProduk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jumlah',
        'harga',
        'total',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function BankSampah(){
        return $this->belongsTo(BankSampah::class, 'id_bnksmph', 'id');
    }

    public function produks(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}

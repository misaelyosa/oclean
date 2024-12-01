<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'namaProduk',
        'harga',
        'jumlah',
        'bank',
    ];

    public function BankSampah(){
        return $this->belongsTo(BankSampah::class, 'bank', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'totalSampah',
        'admin',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'admin', 'id');
    }

    public function produks(){
        return $this->hasMany(Produk::class, 'bank', 'id');
    }
}

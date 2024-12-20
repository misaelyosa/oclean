<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampah extends Model
{
    use HasFactory;
    protected $table = 'TransaksiSampah'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'berat',
        'status',
        'user_id',
        'id_bnksmph',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function BankSampah(){
        return $this->belongsTo(BankSampah::class, 'id_bnksmph', 'id');
    }
}

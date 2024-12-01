<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampah extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'berat',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function BankSampah(){
        return $this->belongsTo(BankSampah::class, 'id_bnksmph', 'id');
    }
}

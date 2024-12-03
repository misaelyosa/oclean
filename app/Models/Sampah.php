<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'sampah';

    protected $fillable = [
        'user_id',
        'berat',
        'foto',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

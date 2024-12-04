<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'umur',
        'gender',
        'no_telp',
        'poin',
    ];

    protected $attributes = [
        'poin' => 0,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ekosistems(){
        return $this->belongsTo(Ekosistem::class, 'id_lokasi', 'id');
    }

    public function roles(){
        return $this->hasMany(Roles::class, 'user_id', 'id');
    }

    public function BankSampah(){
        return $this->hasMany(BankSampah::class, 'admin', 'id');
    }

    public function TransaksiSampah(){
        return $this->hasMany(TransaksiSampah::class, 'id_user', 'id');
    }

    // public function sampahs(){
    //     return $this->hasMany(Sampah::class);
    // }

    public function TransaksiProduk(){
        return $this->hasMany(TransaksiProduk::class, 'id_user', 'id');
    }

    public function CatatanProduk(){
        return $this->hasMany(CatatanProduk::class, 'id_user', 'id');
    }
    
    public function sampah(){
        return $this->hasMany(Sampah::class, 'user_id', 'id');
    }

    public function verifiedSampah(){
        return $this->hasMany(Sampah::class, 'admin_id', 'id');
    }
}

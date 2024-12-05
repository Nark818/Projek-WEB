<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
    ];

    /**
     * Relasi ke pengguna (user).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke produk.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

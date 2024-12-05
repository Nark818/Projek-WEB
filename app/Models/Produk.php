<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock', 'image', 'category', 'seller_id', 'store_id'];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id')->where('role', 'seller');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}

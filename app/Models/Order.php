<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //relasi order ke cart dan user
    public function cart()
    {
        // return $this->belongsToMany(Cart::Class); // percobaan pertama gagal salah memilih metode relasi
        return $this->belongsTo(Cart::class);
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id', 'id'); // percobaan pertama gagal salah memilih metode relasi
        // return $this->hasOneThrough(User::class, Cart::class, 'user_id', 'cart_id', 'id', 'id'); // penempatan urutan key salah
        return $this->hasOneThrough(
            User::class, // Model tujuan akhir
            Cart::class, // Model perantara
            'id', // Foreign key di tabel perantara (Cart) yang merujuk ke tabel awal (Order)
            'id', // Foreign key di tabel tujuan akhir (User) yang merujuk ke tabel perantara (Cart)
            'cart_id', // Local key di tabel awal (Order)
            'user_id' // Local key di tabel perantara (Cart)
        );
    }

    protected $guarded = ['id'];
}

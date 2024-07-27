<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Yang dapat disini
    // protected $fillable = [
    //     'image',
    //     'keterangan'

    // ];

    // Yang tidak dapat diisi
    protected $guarded = ['id'];
}

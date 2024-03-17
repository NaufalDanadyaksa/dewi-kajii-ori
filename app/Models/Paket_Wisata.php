<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket_Wisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
    ];
    protected $table = 'paket_wisata';
}

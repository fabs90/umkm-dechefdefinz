<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KueTradisional extends Model
{
    use HasFactory;

    protected $table = "kue_tradisional";
    protected $fillable = ['image', 'name', 'harga_normal', 'harga_diskon', 'deskripsi', 'slug'];
}

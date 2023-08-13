<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan_Kemasan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'bahan_kemasan';
    protected $fillable = ['nama_bahan', 'harga'];
}

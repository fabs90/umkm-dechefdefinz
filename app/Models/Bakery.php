<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakery extends Model
{
    use HasFactory;
    protected $table = "bakeries";
    protected $primaryKey = 'id';

    protected $fillable = ['image', 'name', 'harga_normal', 'harga_diskon', 'deskripsi', 'slug'];

    public function BahanMenuBakery()
    {
        return $this->hasOne(BahanMenuBakery::class, 'id_menu', 'id');
    }
}

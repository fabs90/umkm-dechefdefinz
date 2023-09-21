<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Kue extends Model
{
    use HasFactory;

    protected $table = "menu_kue";
    protected $primaryKey = 'id';

    protected $fillable = ['image', 'name', 'harga_normal', 'harga_diskon', 'deskripsi', 'slug'];

    public function BahanMenuCake()
    {
        return $this->hasOne(BahanMenuCake::class, 'id_menu', 'id');
    }
}

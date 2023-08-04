<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Kue extends Model
{
    use HasFactory;

    protected $table = "menu_kue";
    protected $fillable = ['image', 'name', 'harga_normal', 'deskripsi'];
}

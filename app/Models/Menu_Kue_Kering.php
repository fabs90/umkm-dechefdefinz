<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Kue_Kering extends Model
{
    use HasFactory;
    protected $table = "menu_kue_kering";
    protected $primaryKey = 'id';
    protected $fillable = ['image', 'name', 'harga_normal', 'harga_diskon', 'deskripsi', 'slug'];

    public function BahanMenuKueKering()
    {
        return $this->hasOne(BahanMenuKueKering::class, 'id_menu', 'id');
    }
}

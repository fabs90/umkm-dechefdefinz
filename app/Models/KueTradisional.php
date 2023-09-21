<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KueTradisional extends Model
{
    use HasFactory;

    protected $table = "kue_tradisional";
    protected $primaryKey = 'id';

    protected $fillable = ['image', 'name', 'harga_normal', 'harga_diskon', 'deskripsi', 'slug'];

    public function BahanMenuKueTradisional()
    {
        return $this->hasOne(BahanMenuKueTradisional::class, 'id_menu', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan_Baku extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';

    protected $fillable = ['nama_bahan', 'harga', 'satuan'];

    public function BahanMenuKueKering()
    {
        return $this->hasOne(BahanMenuKueKering::class, 'id_bahan', 'id');
    }

    public function BahanMenuCake()
    {
        return $this->hasOne(BahanMenuCake::class, 'id_bahan', 'id');
    }
    public function BahanMenuKueTradisional()
    {
        return $this->hasOne(BahanMenuKueTradisional::class, 'id_bahan', 'id');
    }
    public function BahanMenuBakery()
    {
        return $this->hasOne(BahanMenuBakery::class, 'id_bahan', 'id');
    }

    public function BahanMenuNasi()
    {
        return $this->hasOne(BahanMenuNasi::class, 'id_bahan', 'id');
    }

}

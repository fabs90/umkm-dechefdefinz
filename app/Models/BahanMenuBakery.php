<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanMenuBakery extends Model
{
    use HasFactory;
    protected $table = 'bahan_menu_bakeries';

    protected $fillable = ['id_menu', 'id_bahan'];

    public $timestamps = false;

    public function Bakery()
    {
        return $this->belongsTo(Bakery::class, 'id_menu', 'id');
    }

    public function BahanBaku()
    {
        return $this->belongsTo(Bahan_Baku::class, 'id_bahan', 'id');
    }
}

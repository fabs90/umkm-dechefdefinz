<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BahanMenuNasi extends Model
{
    use HasFactory;

    protected $table = 'bahan_menu_nasi';

    protected $fillable = ['id_menu', 'id_bahan'];

    public $timestamps = false;

    public function MenuNasi()
    {
        return $this->belongsTo(Menu_Nasi::class, 'id_menu', 'id');
    }

    public function BahanBaku(): BelongsTo
    {
        return $this->belongsTo(Bahan_Baku::class, 'id_bahan', 'id');
    }
}

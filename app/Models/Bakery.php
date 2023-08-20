<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakery extends Model
{
    use HasFactory;
    protected $table = "bakeries";
    protected $fillable = ['image', 'name', 'harga_normal', 'deskripsi', 'slug'];
}

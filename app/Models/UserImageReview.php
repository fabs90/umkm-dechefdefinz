<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImageReview extends Model
{
    use HasFactory;

    protected $table = "user_image_review";
    protected $fillable = ['name', 'no_telp', 'image'];
}

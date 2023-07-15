<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'url',
        'description',
        'image_file_name',
        'date_time',
        'created_at',
        'updated_at',
    ];
}

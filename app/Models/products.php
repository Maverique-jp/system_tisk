<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'row_number',
        'product_name',
        'category',
        'price',
        'stock',
        'comment',
        'img_path',
    ];
}

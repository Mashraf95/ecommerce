<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image(){
        return$this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function Category(){
        return$this->belongsTo(Category::class, 'category_id', 'id');
    }
}

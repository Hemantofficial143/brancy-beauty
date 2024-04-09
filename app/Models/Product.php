<?php

namespace App\Models;

use App\Helpers\FileHelper;
use BinaryCats\Sku\HasSku;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Irfan\LaravelUniqueSlug\Facades\UniqueSlug;

class Product extends BaseModel
{
    use HasFactory,HasSku;

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }



}

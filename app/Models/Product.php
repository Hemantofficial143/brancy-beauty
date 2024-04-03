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

    public function list($data)
    {
        $records = $this;
        if (!empty($data)) {

            $perPage = 10;
            if(!empty($data['per_page'])){
                $perPage = $data['per_page'];
            }
            return $records->paginate($perPage);
        }
        return $records->all();
    }

    public function saveRecord($data)
    {
        $product = new $this();


        $product->title = $data['title'];
        $product->slug = UniqueSlug::generate($this,$product->title,'slug');
        $product->description = $data['description'];
        $product->mrp = $data['mrp'];
        $product->price = $data['price'];
        $product->status = $data['status'] == 'ACTIVE' ? true : false;
        $product->category_id = $data['category'];
        $product->tags = !empty($data['tags']) ? $data['tags'] : null;
        $product->save();

        if(!empty($data['images']) && is_array($data['images'])){
            $productImageObj = new ProductImage();
            foreach ($data['images'] as $oneImage){
                $productImageObj->saveImage([
                    'file' => $oneImage,
                    'product_id' => $product->id
                ]);
            }
        }
        return $product;
    }

    public function getProductBySlug($slug)
    {
        return $this->where('slug',$slug)->first();
    }



}

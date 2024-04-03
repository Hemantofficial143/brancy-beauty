<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel
{
    use HasFactory;

    protected $appends = [
        'image_path'
    ];

    public function getImagePathAttribute()
    {
        $fileUploadObj = new FileHelper();
        return $fileUploadObj->getFileURL('products',$this->image);
    }

    public function saveImage($data)
    {
        $fileUploadObj = new FileHelper();
        $file = $data['file'];

        $productImage = new $this();
        $productImage->product_id = $data['product_id'];
        $productImage->image = $fileUploadObj->uploadFile('products',$file);
        $productImage->save();
        return $productImage;

    }

}

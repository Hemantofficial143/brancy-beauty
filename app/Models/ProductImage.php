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


}

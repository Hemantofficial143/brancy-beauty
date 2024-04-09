<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;

    protected $appends = [

        'image_path'
    ];
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;


    public function getImagePathAttribute()
    {

        if (!empty($this->image)) {
            $fileHelperObj = new FileHelper();
            return $fileHelperObj->getFileURL('categories', $this->image);
        }
        return null;
    }




}

<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends BaseModel
{
    use HasFactory;

    protected $appends = [
        'tags_array',
        'image_path'
    ];
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public function getTagsArrayAttribute()
    {
        return !empty($this->tags)? explode(',',$this->tags) : [];
    }

    public function getImagePathAttribute()
    {

        if(!empty($this->image)){
            $fileHelperObj = new FileHelper();
            return $fileHelperObj->getFileURL('blogs',$this->image);
        }
        return null;
    }

}

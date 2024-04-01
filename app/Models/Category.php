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


    public function list($data)
    {
        $records = $this;
        if (!empty($data)) {
            return $records->paginate(10);
        }
        return $records->all();
    }

    public function saveRecord($data)
    {
        $category = new $this();
        $category->name = $data['name'];
        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $category->image = $fileHelperObj->uploadFile('categories', $data['image']);
        }

        $category->status = isTrue($data['status']);
        $category->save();
        return $category;
    }

    public function load($id)
    {
        return $this->find($id);
    }

    public function updateRecord($id, $data)
    {
        $category = $this->load($id);
        $category->name = $data['name'];


        if (!empty($data['delete_image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('categories', $category->image);
            $category->image = null;
        }

        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('categories', $category->image);
            $category->image = $fileHelperObj->uploadFile('categories', $data['image']);
        }


        $category->status = isTrue($data['status']);
        $category->save();
        return $category;
    }


}

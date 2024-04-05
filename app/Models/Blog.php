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



    public function load($id)
    {
        return $this->find($id);
    }

    public function list($data)
    {
        $records = $this;
        if(!empty($data)){
            return $records->paginate(10);
        }
        return $records->all();
    }

    public function saveRecord($data)
    {
        $blog = new $this();
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        if(!empty($data['tags'])){
            $blog->tags = $data['tags'];
        }

        if(!empty($data['image'])){
            $fileHelperObj = new FileHelper();
            $blog->image = $fileHelperObj->uploadFile('blogs',$data['image']);
        }

        $blog->status = isTrue($data['status']);
        $blog->save();
        return $blog;
    }

    public function updateRecord($id,$data)
    {
        $blog = $this->load($id);
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        if(!empty($data['tags'])){
            $blog->tags = $data['tags'];
        }



        if(!empty($data['delete_image'])){
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('blogs',$blog->image);
            $blog->image = null;
        }

        if(!empty($data['image'])){
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('blogs',$blog->image);
            $blog->image = $fileHelperObj->uploadFile('blogs',$data['image']);
        }


        $blog->status = isTrue($data['status']);
        $blog->save();
        return $blog;
    }

    public function getBlogBySlug($slug)
    {
        return $this->where('slug',$slug)->first();
    }

}

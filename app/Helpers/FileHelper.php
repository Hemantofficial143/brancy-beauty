<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper{


    public function getFileURL($disk,$fileName)
    {
        return Storage::disk($disk)->url($fileName);
    }

    public function uploadFile($disk,$file)
    {
        return Storage::disk($disk)->put('',$file);
    }

    public function deleteFile($disk,$file)
    {
        if(!empty($file)){
            return Storage::disk($disk)->delete($file);
        }
    }

}

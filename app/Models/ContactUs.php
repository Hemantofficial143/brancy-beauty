<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends BaseModel
{

    public function list($data)
    {
        $records = $this;

        if(!empty($data['with_pagination'])){
            return $records->paginate(10);
        }
        return $records->all();
    }

}

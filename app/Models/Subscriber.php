<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends BaseModel
{
    use SoftDeletes;

    public function list($data)
    {
        $records = $this;

        if(!empty($data['with_trashed'])){
            $records = $records->withTrashed();
        }

        if(!empty($data['with_pagination'])){
            return $records->paginate(10);
        }
        return $records->all();
    }

}

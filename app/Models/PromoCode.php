<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends BaseModel
{
    use HasFactory;

    const TYPE_FIXED = 'FIXED';
    const TYPE_PERCENTAGE = 'PERCENTAGE';


    public function list($data)
    {
        $records = $this;

        if(!empty($data['with_pagination'])){
            return $records->paginate(10);
        }

        return $records->all();
    }


    public function saveRecord($data)
    {
        $promocode = new $this();
        $promocode->code = $data['code'];
        $promocode->type = $data['type'];
        $promocode->value = $data['value'];
        if(!empty($data['min_order_value'])){
            $promocode->min_order_value = $data['min_order_value'];
        }
        $promocode->save();
        return $promocode;
    }

}

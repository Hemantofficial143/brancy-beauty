<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends BaseModel
{
    use HasFactory;

    const TYPE_FIXED = 'FIXED';
    const TYPE_PERCENTAGE = 'PERCENTAGE';


}

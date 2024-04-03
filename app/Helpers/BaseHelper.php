<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class BaseHelper{

    public function formatePrice($amount)
    {
        return '₹'.$amount;
    }




}

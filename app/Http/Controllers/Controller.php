<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected object $modelObject;

    public function __construct()
    {
        $blogsObj = new Blog();
        $blogs = $blogsObj->list([]);

        View::share('blogs',$blogs);

    }

}

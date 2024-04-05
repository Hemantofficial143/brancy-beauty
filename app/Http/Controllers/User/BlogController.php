<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->modelObject = new Blog();
    }

    public function index()
    {
        $blogs = $this->modelObject->list(['with_pagination' => true,'per_page' => 9]);

        return view('user.blog.list',['blogs' => $blogs]);
    }

    public function detail($slug)
    {

        $blog = $this->modelObject->getBlogBySlug($slug);
        if(!$blog){
            return 'Invalid Blog URL';
        }
        return view('user.blog.detail',['blog' => $blog]);

    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = new Blog();
        $blogs = $blogs->paginate(9);
        return view('user.blog.list',['blogs' => $blogs]);
    }

    public function detail($slug)
    {

        $blog = Blog::where('slug',$slug)->first();
        if(!$blog){
            return 'Invalid Blog URL';
        }
        return view('user.blog.detail',['blog' => $blog]);

    }
}

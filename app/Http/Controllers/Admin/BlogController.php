<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $blogs = new Blog();
        $blogs = $blogs->paginate(10);
        return view('admin.blog.list', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'title' => ['required'],
            'description' => ['required'],
        ];
        if (!empty($data['image'])) {
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }
        $request->validate($rules, [
            'image.mimes' => 'Image must be in jpg, jpeg or png format.'
        ]);
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->tags = !empty($data['tags']) ? $data['tags'] : null;
        $blog->slug = Str::slug($data['title']);
        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $blog->image = $fileHelperObj->uploadFile('blogs', $data['image']);
        }
        $blog->status = isTrue($data['status']);
        $blog->save();

        return ['success' => true, 'data' => $blog, 'message' => 'Blog created successfully.'];
    }


    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $rules = [
            'title' => ['required'],
            'description' => ['required'],
        ];

        if (!empty($data['image'])) {
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }
        $request->validate($rules);

        $blog = Blog::find($id);

        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->tags = !empty($data['tags']) ? $data['tags'] : null;

        if (!empty($data['delete_image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('blogs', $blog->image);
            $blog->image = null;
        }
        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('blogs', $blog->image);
            $blog->image = $fileHelperObj->uploadFile('blogs', $data['image']);
        }
        $blog->status = isTrue($data['status']);
        $blog->save();
        return ['success' => true, 'data' => $blog, 'message' => 'Blog updated successfully.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id)->delete();
        return ['success' => true, 'message' => 'Blog deleted successfully.'];
    }

}

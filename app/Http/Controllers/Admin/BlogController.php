<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->modelObject = new Blog();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $data['with_pagination'] = true;
        $blogs = $this->modelObject->list($data);
        return view('admin.blog.list',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = null;

        return view('admin.blog.create',['blog' => $blog]);
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

        if(!empty($data['image'])){
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }

        $request->validate($rules,[
            'image.mimes' => 'Image must be in jpg, jpeg or png format.'
        ]);

        $blog = $this->modelObject->saveRecord($data);
        return ['success' => true, 'data' => $blog,'message' => 'Blog created successfully.'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = $this->modelObject->load($id);
        return view('admin.blog.create',['blog' => $blog]);
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

        if(!empty($data['image'])){
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }
        $request->validate($rules);

        $blog = $this->modelObject->updateRecord($id,$data);
        return ['success' => true, 'data' => $blog,'message' => 'Blog updated successfully.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->modelObject->remove($id);
        return ['success' => true, 'message' => 'Blog deleted successfully.'];
    }

}

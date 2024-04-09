<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $categories = new Category();
        $categories = $categories->paginate(10);
        return view('admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = null;

        return view('admin.category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => ['required'],
        ];
        if (!empty($data['image'])) {
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }
        $request->validate($rules, [
            'image.mimes' => 'Image must be in jpg, jpeg or png format.'
        ]);

        $category = new Category();
        $category->name = $data['name'];
        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $category->image = $fileHelperObj->uploadFile('categories', $data['image']);
        }

        $category->status = isTrue($data['status']);
        $category->save();


        return ['success' => true, 'data' => $category, 'message' => 'Category created successfully.'];
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
        $category = Category::find($id);
        return view('admin.category.create',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $rules = [
            'name' => ['required'],
        ];
        if (!empty($data['image'])) {
            $rules['image'] = ['mimes:jpg,png,jpeg,webp'];
        }
        $request->validate($rules);


        $category = Category::find($id);
        $category->name = $data['name'];


        if (!empty($data['delete_image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('categories', $category->image);
            $category->image = null;
        }

        if (!empty($data['image'])) {
            $fileHelperObj = new FileHelper();
            $fileHelperObj->deleteFile('categories', $category->image);
            $category->image = $fileHelperObj->uploadFile('categories', $data['image']);
        }


        $category->status = isTrue($data['status']);
        $category->save();


        return ['success' => true, 'data' => $category, 'message' => 'Category updated successfully.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return ['success' => true, 'message' => 'Category deleted successfully.'];

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->modelObject = new Category();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $data['with_pagination'] = true;
        $categories = $this->modelObject->list($data);

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
        $category = $this->modelObject->saveRecord($data);
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
        $category = $this->modelObject->load($id);
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

        $category = $this->modelObject->updateRecord($id, $data);
        return ['success' => true, 'data' => $category, 'message' => 'Category updated successfully.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->modelObject->remove($id);
        return ['success' => true, 'message' => 'Category deleted successfully.'];

    }
}

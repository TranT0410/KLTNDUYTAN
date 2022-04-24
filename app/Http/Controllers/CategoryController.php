<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(config('constants.paginate_10'));

        return view('admin.category.list', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/category', 'images');
        }
        Category::create($data);

        return redirect(route('admin.category.list'))->with('status', 'Create Category Successfully!');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.update', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/category', 'images');
        }
        $category->update($data);

        return redirect(route('admin.category.list'))->with('status', 'Update category successfully!');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect(route('admin.category.list'))->with('status', 'Delete category successfully!');
    }

    public function view($id)
    {
        $category = Category::find($id);

        return view('admin.category.view', compact('category'));
    }
}
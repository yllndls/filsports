<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $category = new Category();
        $category->name = $request->name;
        $category->price = $request->price;
    
        if ($request->hasFile('cover_photo')) {
            $path = $request->file('cover_photo')->store('categories', 'public');
            $category->cover_photo = $path;
        }
    
        $category->save();
    
        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_photo')) {
            Storage::delete('public/' . $category->cover_photo);
            $imagePath = $request->file('cover_photo')->store('categories', 'public');
            $data['cover_photo'] = $imagePath;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        Storage::delete('public/' . $category->cover_photo);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    public function getProducts($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;

        return response()->json([
            'category_name' => $category->name,
            'products' => $products
        ]);
    }
}


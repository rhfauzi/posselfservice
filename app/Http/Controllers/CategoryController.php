<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index() {
    confirmDelete('Data will be deleted permanently');
    $categories = Category::select('id', 'category_name', 'slug', 'image')
      ->get()
      ->map(function ($q) {
        return $q;
      });

    return view('category.index', compact('categories'));
  }

  public function create() {
    return view('category.create');
  }

  public function store(CategoryStoreRequest $request) {
    $slug = Str::slug($request->category_name);
      $image = $request->file('image');
    $fileName = $slug . '.' . $image->getClientOriginalExtension();

    Storage::disk('public')->putFileAs('category', $image, $fileName);
    Category::create([
      'category_name' => $request->category_name,
      'slug' => $slug,
      'image' => $fileName
    ]);

    toast('Category created Successfully', 'sucess');
    return redirect()->route('data-category.index');
  }

  public function edit(string $slug) {
    $category = Category::where('slug', $slug)->first();
    $category->image = $category->image;
    return view('category.edit', compact('category'));
  }

  public function update(CategoryUpdateRequest $request, Category $data_category)
  {
    $categoryName = $request->category_name;
    $slug = Str::slug($categoryName);
    $data_category->category_name = $categoryName;
    $data_category->slug = $slug;

    if ($request->hasFile('image')) {
      Storage::disk('public')->delete('category/' . $slug);
      $image = $request->file('image');
      $fileName = $slug . '.' . $image->getClientOriginalExtension();
      Storage::disk('public')->putFileAs('category', $image, $fileName);
      $data_category->image = $fileName;
    }
    $data_category->save();

    toast('Category updated Successfully', 'success');
    return redirect()->route('data-category.index');
  }

  public function show(string $slug) {
    $category = Category::where('slug', $slug)->first();
    $category->image = $category->image;
    return view('category.show', compact('category'));
  }

  public function destroy(string $slug) {
    $category = Category::where('slug', $slug)->first();
    Storage::disk('public')->delete('category/' . $category->image);
    $category->delete();

    toast('Category deleted Successfully', 'success');
    return redirect()->route('data-category.index');
  }
}

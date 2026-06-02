<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
  public function index() {
    confirmDelete('Deete this product ?','Data will be deleted permanently');
    $products = Product::with('category:id,category_name')->select('id', 'product_name', 'slug', 'category_id', 'description', 'image', 'is_active')->get()->map(function ($q) {
      $q->image = asset('storege/product/' . $q->image);
      return $q;
    });
    return view('product.index', compact('products'));
  }

  public function create() {
    return view('product.create');
  }
}

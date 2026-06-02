<?php

namespace App\View\Components\Product;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProduct extends Component
{
  /**
   * Create a new component instance.
   */
  public $product, $categories, $action;
  public function __construct($product = null)
  {
    $this->action = route('data-product.store');
    if ($product) {
      $this->action = route('data-product.update', $product->id);
    }
    $this->product = $product;
    $this->categories = Category::orderBy('category_name')->get();
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.product.form-product');
  }
}

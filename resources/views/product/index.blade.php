@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h4 class="card-title">Data Product</h4>
      <a href="{{ route('data-product.create') }}" class="btn btn-primary">
        <i class="ti ti-plus"></i>
        New Product
      </a>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Category</th>
            <th>Variants</th>
            <th>Status</th>
            <th>Oprion</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $index -> product)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->category->category_name }}</td>
              <td>{{ $product->variants->count() }}</td>
              <td>
                <span
                  class="badge rounded-all {{ $product->is_active ? 'text-bg-primary' : 'text-bg-warning' }}">{{ $product->is_active ? 'Active' : 'Not Active' }}</span>
              </td>
              <td></td>
            </tr>
          @empty
            <tr>
              <td class="text-center" colspan="6">No Data</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

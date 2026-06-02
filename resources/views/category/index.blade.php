@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h4 class="card-title">Data Categories</h4>
      <a href="{{ route('data-category.create') }}" class="btn btn-primary">
        <i class="ti ti-plus"></i>
        New Category
      </a>
    </div>
    <div class="card-body">
      <div class="row">
        @forelse ($categories as $category)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              <div class="card-header">
                <div class="card-title text-capitalize">{{ $category->category_name }}</div>
              </div>
              <div class="card-body">
                <img src="{{ asset('storage/category/' . $category->image) }}" alt="{{ $category->category_name }}"
                  class="img-fluid" style="height: 250px; width: 100%; object-fit: cover;">

                <div class="mt-3">
                  <div class="d-flex justify-content-center gap-1">
                    <a href="{{ route('data-category.destroy', $category->slug) }}" data-confirm-delete="true"
                      class="btn btn-danger">
                      <i class="ti ti-trash"></i>
                      Delete
                    </a>

                    <a href="{{ route('data-category.show', $category->slug) }}" class="btn btn-info">
                      <i class="ti ti-basket"></i>
                      Detail
                    </a>

                    <a href="{{ route('data-category.edit', $category->slug) }}" class="btn btn-primary">
                      <i class="ti ti-pencil"></i>
                      Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No Data</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection

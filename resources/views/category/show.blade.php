@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h4 class="card-title">Data Category</h4>

      <a href="{{ route('data-category.index') }}" class="btn btn-outline-dark">
        Back
      </a>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <img src="{{ asset('storage/category/' . $category->image) }}" alt="{{ $category->category_name }}"
            class="img-fluid" style="height: 250px; width: 100%;">
        </div>
        <div class="col-6">
          <h4 class="text-capitalize">Category : {{ $category->category_name }}</h4>
          <div>
            <small>Data Product's</small>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection

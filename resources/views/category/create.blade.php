@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h4 class="card-title">Form Category</h4>

      <a href="{{ route('data-category.index') }}" class="btn btn-outline-dark">
        Back
      </a>
    </div>

    <div class="card-body">
      <x-category.form-category :action="route('data-category.store')" :category="null" />
    </div>
  </div>
@endsection

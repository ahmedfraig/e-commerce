@extends('dashboard.index')
@section('content')


<div class="page-wrapper py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm border-0 rounded">
          <div class="card-header bg-success text-white text-center fs-4 fw-semibold">
            Add New Product
          </div>
          <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Product Name</label>
                <input
                  type="text"
                  name="name"
                  class="form-control form-control-lg"
                  placeholder="Enter product name"
                >
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Price</label>
                <input
                  type="number"
                  name="price"
                  step="0.01"
                  class="form-control form-control-lg"
                  placeholder="Enter price"              
                >
                @error('price')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label fw-semibold">Quantity</label>
                <input
                  type="number"
                  name="quantity"
                  class="form-control form-control-lg"
                  placeholder="Enter quantity"
                  
                >
                @error('quantity')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="category_id" class="form-label fw-semibold">Category</label>
                <select name="category_id" class="form-control form-control-lg">
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Product Image</label>
                <input
                  type="file"
                  name="image"
                  class="form-control form-control-lg"
                >
                @error('image')
                  <div class="text-danger">{{ $message }}</div>
                @enderror                
              </div>

              <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea
                  name="description"
                  rows="3"
                  class="form-control form-control-lg"
                  placeholder="Enter product description"
                ></textarea>
                @error('description')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success fw-semibold">
                  Save Product
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary fw-semibold">
                  Cancel
                </a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>












@endsection
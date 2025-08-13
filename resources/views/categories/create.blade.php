@extends('dashboard.index')

@section('content')
<div class="page-wrapper py-5" style="background-color: #f8f9fa;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-l  <div class="container">
                <div class="card shadow-sm border-0 rounded">
                    {{-- show insert message --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-header bg-primary text-white text-center fs-4 fw-semibold">
                        Create Category
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}">
                            {{-- CSRF Token --}}
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">Category Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    placeholder="Enter category name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                Create Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
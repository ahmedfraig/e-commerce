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

                    {{-- show validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="card-header bg-primary text-white text-center fs-4 fw-semibold">
                        Update Category
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.update',$category->id) }}">
                            {{-- CSRF Token --}}
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">Category Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                value="{{ $category->name }}"
                                    placeholder="Enter category name">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                Update Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('dashboard.index')
@section('content')
<div class="page-wrapper py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-semibold">Products</h2>
            <a href="{{ route('product.create') }}" class="btn btn-success fw-semibold">
                + Add New Product
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded">
            <div class="card-body">
                <div class="table-responsive" style="overflow: visible !important;">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>

                                <th class="position-relative">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if (request()->id>0)
                                                Category ({{ $categories[request()->id-1]->name }})
                                            @else
                                                Category (All Categories)
                                            @endif
                                        </span>
                                        <ul class="dropdown-menu" style="position: absolute; z-index: 1050; transform: translateY(-100%); top: 0; text-align:center; 
                                        background-color:rgba(0,0,0,0.7);">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('product.index') }}">
                                                    All Categories
                                                </a>
                                            </li>
                                            @foreach($categories as $category)
                                                <li>
                                                    <a class="dropdown-item"
                                                    href="{{ route('product.byCategory', $category->id) }}">
                                                    {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </th>



                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('uploads/'.$product->image) }}" alt="Product Image" 
                                            width="100" 
                                            height="40"
                                            class="rounded shadow-sm mx-auto d-block">
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-warning me-1">
                                                Edit
                                            </a>
                                            <form action="{{ route('product.destroy',$product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
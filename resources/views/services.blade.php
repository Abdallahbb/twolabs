@extends('layout.uapp')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-center">Eyeglass & Frames</h3>

    @if ($products->isEmpty())
        <div class="alert alert-danger text-center">
            <p class="m-0">No product available at the moment</p>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('add') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </a>
        </div>
    @else
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('product', $product->id) }}" class="text-decoration-none text-dark">
                        <div class="card border-0 rounded-4 shadow-sm h-100">
                            <img src="{{ asset($product->image) }}" class="card-img-top rounded-top" style="height: 240px; object-fit: cover;" alt="Eyeglass">

                            <div class="card-body">
                                <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
                                <p class="text-danger fw-bold m-0">₦{{ number_format($product->price) }}</p>
                                {{-- Stock Status --}}
                                @if ($product->quantity < 1)
                                    <span class="badge bg-danger mt-2">Out of Stock</span>
                                @else
                                    <span class="badge bg-success mt-2">In Stock</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

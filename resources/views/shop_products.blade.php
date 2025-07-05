@extends('layout.uapp')

@section('content')
<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                
                {{-- Sidebar Section --}}
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                </div>

                {{-- Product Listing --}}
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                    @if ($products->isEmpty())
                        <div class="alert alert-danger text-center">
                            <p class="text-danger m-0">No product has been added</p>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('add') }}" class="btn btn-success">Add Product</a>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 col-lg-3 col-12 mb-4">
                                    <div class="card border-0 rounded-3 shadow-sm h-100">
                                        <img src="{{ asset($product->image) }}" class="card-img-top" height="240" alt="{{ $product->name }}">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h6 class="mt-2">{{ $product->name }}</h6>
                                            <div class="d-flex justify-content-between mt-2">
                                                <p class="fw-semibold text-danger m-0">₦{{ number_format($product->price) }}</p>
                                                <a href="{{ route('edit-product', $product->id) }}" class="btn btn-dark btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

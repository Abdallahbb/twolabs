@extends('layout.uapp')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Product Details Card -->
        <div class="col-lg-10 bg-white p-4 p-lg-5 rounded-4 shadow-sm">
            <div class="row g-4 align-items-start">
                <!-- Product Image -->
                <div class="col-md-6">
                    <div class="border rounded-3 overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid w-100">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-md-6">
                    <h2 class="fw-bold">{{ $product->name }}</h2>
                    <p class="fs-4 text-danger fw-semibold">₦{{ number_format($product->price) }}</p>

                    <p class="text-muted mt-3">{{ $product->description }}</p>

                    <div class="mt-4">
                        @if ($product->quantity > 0)
                            @auth
                                @if (empty($cart))
                                    <form action="{{ route('addToCart') }}" method="POST" class="d-flex flex-column gap-3">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <button class="btn btn-success rounded-pill py-2 px-4">Add to Cart</button>
                                    </form>
                                @else
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <form action="{{ route('cartminus') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <button type="submit" class="btn btn-outline-secondary {{ $cart->quantity < 2 ? 'disabled' : '' }}">-</button>
                                        </form>

                                        <input type="text" value="{{ $cart->quantity }}" class="form-control text-center w-auto" style="max-width: 50px;" readonly>

                                        <form action="{{ route('cartplus') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <button type="submit" class="btn btn-outline-secondary 
                                                    {{ $cart->quantity >= $cart->product->quantity ? 'disabled' : '' }}">+
                                            </button>

                                        </form>

                                        <span class="ms-3 text-muted">({{ $cart->quantity }} item(s) added)</span>
                                    </div>

                                    <div class="d-flex gap-3">
                                        <a href="{{ route('cart') }}" class="btn btn-dark btn-sm">Checkout</a>
                                        <a href="{{ route('services') }}" class="btn btn-outline-primary btn-sm">Continue Shopping</a>
                                    </div>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-danger px-5 py-2 rounded-pill">Sign in to add to cart</a>
                            @endauth
                        @else
                            <button class="btn btn-outline-danger rounded-pill" disabled>Out of Stock</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-5">
        <h3 class="mb-4">Related Products</h3>

        @if ($products->isEmpty())
            <div class="alert alert-warning">
                <p class="mb-0">No related products available at the moment.</p>
            </div>
            <div class="text-center">
                <a href="{{ route('add') }}" class="btn btn-success">Add Product</a>
            </div>
        @else
            <div class="row g-4">
                @foreach ($products as $related)
                    <div class="col-md-4 col-lg-3">
                        <a href="{{ route('product', $related->id) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                                <img src="{{ asset($related->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $related->name }}">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-1">{{ $related->name }}</h6>
                                    <p class="text-danger fw-bold mb-0">₦{{ number_format($related->price) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

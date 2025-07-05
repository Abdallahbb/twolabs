@extends('layout.uapp')

@section('content')
<main>
    <section>
        <div class="container">

            <!-- Back Button -->
            <button onclick="history.back()" class="btn btn-sm btn-outline-dark mb-3">Back</button>

            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">

                    <!-- Success Alert -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            <p class="text-success mb-0">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        @php $total = 0; @endphp

                        <!-- Check for Cart Items -->
                        @if ($carts->isEmpty())
                            <div class="alert alert-danger">
                                <p class="text-danger mb-0">No order has been placed.</p>
                            </div>
                        @else
                            @foreach ($carts as $cart)
                                @php $total += $cart->product->price * $cart->quantity; @endphp

                                <div class="col-md-12 col-lg-8 mb-3">
                                    <div class="bg-white p-3 rounded-3 d-flex justify-content-between align-items-center">

                                        <!-- Product Info -->
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($cart->product->image) }}" height="60" width="60" alt="Product Image">
                                            <div class="ms-3">
                                                <h5 class="text-muted mb-1">{{ $cart->product->name }}</h5>
                                                <p class="fw-semibold m-0">
                                                    ₦{{ number_format($cart->product->price * $cart->quantity) }} - Qty ({{ $cart->quantity }})
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Date Info -->
                                        <div class="text-end">
                                            <p class="m-0 text-muted">Ordered On</p>
                                            <p class="m-0">{{ $cart->created_at->format('Y M d') }}</p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                            <!-- Total Price -->
                            <div class="col-md-12 text-center mt-4">
                                <h5>Total Price: ₦{{ number_format($total) }}</h5>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

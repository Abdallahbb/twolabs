@extends('layout.uapp')

@section('content')
<main>
    <section>
        <div class="container">

            {{-- Back Button --}}
            <button onclick="history.back()" class="btn btn-sm btn-outline-dark mb-3">← Back</button>

            <div class="row justify-content-center">

                {{-- Sidebar --}}
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                </div>

                {{-- Main Content --}}
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            <p class="text-success mb-0">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="row justify-content-center">

                        {{-- Check if Cart is Empty --}}
                        @if ($carts->isEmpty())
                            <div class="alert alert-danger">
                                <p class="text-danger mb-0">Order has already been processed</p>
                            </div>
                        @else
                            {{-- Cart Items --}}
                            @foreach ($carts as $cart)
                                <div class="col-md-12 col-lg-8 mb-3">
                                    <div class="bg-white p-3 rounded-3 d-flex justify-content-between">
                                        
                                        {{-- Product Info --}}
                                        <div class="d-flex">
                                            <img 
                                                src="{{ asset($cart->product->image) }}" 
                                                height="60" 
                                                width="60" 
                                                class="rounded" 
                                                alt="Product Image"
                                            >
                                            <div class="ms-3">
                                                <h5 class="text-muted mb-1">{{ $cart->product->name }}</h5>
                                                <p class="fw-semibold mb-0">
                                                    ₦{{ number_format($cart->product->price * $cart->quantity) }} 
                                                    ({{ $cart->quantity }})
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Order Date --}}
                                        <div class="align-self-center text-end">
                                            <p class="mb-1 text-muted small">Ordered On</p>
                                            <p class="mb-0">{{ $cart->created_at->format('Y-m-d') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Approve Order Section --}}
                            <div class="col-md-12 col-lg-8 mb-3">
                                @if ($order->status === 'Approved' && $order->approval === 'Pending')
                                    <form action="{{ route('approveOrder') }}" method="POST" class="text-end">
                                        @csrf
                                        <input type="hidden" name="order_number" value="{{ $order_number }}">
                                        <button class="btn btn-dark" type="submit">Approve Order</button>
                                    </form>
                                @elseif ($order->approval !== 'Pending')
                                    <div class="text-end">
                                        <button class="btn btn-secondary" disabled>Approval Completed</button>
                                    </div>
                                @endif
                            </div>

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection

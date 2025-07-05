@extends('layout.uapp')
@section('content')
<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <!-- Sidebar -->
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                    <div class="tpshop__widget">
                        <div class="tpshop__sidbar-thumb mt-35">
                            <img src="{{ asset('assets/img/shape/sidebar-product-1.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                    <div class="row">
                        @if (session('success'))
                            <div class="alert alert-success mb-3">
                                <p class="text-success m-0 p-0">{{ session('success') }}</p>
                            </div>
                        @endif

                        @if ($orders->isEmpty())
                            <div class="alert alert-danger">
                                <p class="text-danger m-0 p-0">No order has been placed</p>
                            </div>
                        @else
                            @foreach ($orders as $order)
                                <div class="col-md-12 col-lg-8 col-12 mb-3">
                                    <a href="{{ route('order-details', $order->order_number) }}" class="text-decoration-none text-dark">
                                        <div class="bg-white p-3 rounded-3 d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/order.png') }}" height="60" width="60" alt="Order Icon">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">
                                                        Order Number: <span class="small">{{ $order->order_number }}</span>
                                                    </h5>
                                                    <p class="fw-semibold m-0">Order Cost: ₦{{ number_format($order->cost) }}</p>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <p class="m-0 text-muted">Ordered On</p>
                                                <p class="m-0">{{ $order->created_at->format('Y-m-d') }}</p>

                                                <!-- Action Buttons -->
                                                <div class="d-flex justify-content-end mt-2">
                                                    <!-- Confirm Order -->
                                                    <form action="{{ route('confirm-order') }}" method="POST" class="me-2">
                                                        @csrf
                                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                            onclick="return confirm('Are you sure you want to confirm this order?')">
                                                            Confirm
                                                        </button>
                                                    </form>

                                                    <!-- Cancel Order -->
                                                    <form action="{{ route('cancel-order') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to cancel this order?')">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

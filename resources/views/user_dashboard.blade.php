@extends('layout.uapp')

@section('content')
<main class="py-5">
    <section>
        <div class="container">

            {{-- Summary Cards --}}
            <div class="row g-3 justify-content-center text-center">
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="alert alert-success rounded-4 shadow-sm py-4">
                            <h4 class="fw-bold">{{ number_format($approved_count) }}</h4>
                            <p class="m-0">Approved Appointments</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="alert alert-warning rounded-4 shadow-sm py-4">
                            <h4 class="fw-bold">{{ number_format($order_count) }}</h4>
                            <p class="m-0">Pending Orders</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="alert alert-primary rounded-4 shadow-sm py-4">
                            <h4 class="fw-bold">{{ $all_order }}</h4>
                            <p class="m-0">Order History</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="alert alert-secondary rounded-4 shadow-sm py-4">
                            <h4 class="fw-bold">{{ number_format($app_count) }}</h4>
                            <p class="m-0">Pending Appointments</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success my-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row g-4 mt-3">
                {{-- Orders Section --}}
                <div class="col-lg-6">
                    {{-- Approved Orders --}}
                    <div class="bg-white rounded-4 p-4 shadow-sm mb-4">
                        <h5 class="mb-3">Approved Orders</h5>
                        @forelse ($approved_orders as $order)
                            <a href="{{ route('user-order-details', $order->order_number) }}" class="text-decoration-none text-dark">
                                <div class="bg-light p-3 rounded-3 d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/order.png') }}" class="rounded-3 me-3" width="60" height="60" alt="Order">
                                        <div>
                                            <h6 class="m-0 text-muted">Order #: <span class="text-dark">{{ $order->order_number }}</span></h6>
                                            <p class="m-0">Cost: ₦{{ number_format($order->cost) }}</p>
                                        </div>
                                    </div>
                                    <span class="badge rounded-pill {{ $order->approval == 'Pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                        {{ $order->approval }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <div class="alert alert-danger">No approved orders</div>
                        @endforelse
                    </div>

                    {{-- Pending Orders --}}
                    <div class="bg-white rounded-4 p-4 shadow-sm">
                        <h5 class="mb-3">Pending Orders</h5>
                        @forelse ($orders as $order)
                            <a href="{{ route('user-order-details', $order->order_number) }}" class="text-decoration-none text-dark">
                                <div class="bg-light p-3 rounded-3 d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/images/order.png') }}" class="rounded-3 me-3" width="60" height="60" alt="Order">
                                        <div>
                                            <h6 class="m-0 text-muted">Order #: <span class="text-dark">{{ $order->order_number }}</span></h6>
                                            <p class="m-0">Cost: ₦{{ number_format($order->cost) }}</p>
                                        </div>
                                    </div>
                                    <span class="badge rounded-pill {{ $order->approval == 'Pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                        {{ $order->approval }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <div class="alert alert-danger">No pending orders</div>
                        @endforelse
                    </div>
                </div>

                {{-- Appointments Section --}}
                <div class="col-lg-6">
                    {{-- Approved Appointments --}}
                    <div class="bg-white rounded-4 p-4 shadow-sm mb-4">
                        <h5 class="mb-3">Approved Appointments</h5>
                        @forelse ($approved_appointments as $appointment)
                            <div class="bg-light p-3 rounded-3 d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3 me-3" width="60" height="60" alt="Appointment">
                                    <div>
                                        <h6 class="m-0 text-muted">Date: {{ $appointment->app_date }}</h6>
                                        <p class="m-0">Time: {{ $appointment->app_time->format('h:i A') }}</p>
                                        <span class="badge rounded-pill {{ $appointment->status == 'Pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                            {{ $appointment->status }}
                                        </span>
                                    </div>
                                </div>
                                <form action="{{ route('decline') }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </div>
                        @empty
                            <div class="alert alert-danger">No approved appointments</div>
                        @endforelse
                    </div>

                    {{-- Pending Appointments --}}
                    <div class="bg-white rounded-4 p-4 shadow-sm">
                        <h5 class="mb-3">Pending Appointments</h5>
                        @forelse ($appointments as $appointment)
                            <div class="bg-light p-3 rounded-3 d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3 me-3" width="60" height="60" alt="Appointment">
                                    <div>
                                        <h6 class="m-0 text-muted">Date: {{ $appointment->app_date }}</h6>
                                        <p class="m-0">Time: {{ $appointment->app_time->format('h:i A') }}</p>
                                        <span class="badge rounded-pill {{ $appointment->status == 'Pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                            {{ $appointment->status }}
                                        </span>
                                    </div>
                                </div>
                                <form action="{{ route('decline') }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </div>
                        @empty
                            <div class="alert alert-danger">No pending appointments</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection

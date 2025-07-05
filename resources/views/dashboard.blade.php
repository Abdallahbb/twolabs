@extends('layout.uapp')

@section('content')

<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">

                <!-- Sidebar -->
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                </div>

                <!-- Main Content -->
                <div class="col-xl-10 col-lg-12 col-md-12">
                    <!-- Success Message -->
                    @if (session('product_success'))
                        <div class="alert alert-success">
                            <p class="text-success mb-0">{{ session('product_success') }}</p>
                        </div>
                    @endif

                    <!-- Stats Row -->
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <a href="#" class="text-muted text-decoration-none fw-medium">
                                <div class="alert-success alert py-3 px-4 rounded-3">
                                    <h4>{{ number_format($total_products) }}</h4>
                                    Products
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="#" class="text-muted text-decoration-none fw-medium">
                                <div class="alert alert-warning py-3 px-4 rounded-3">
                                    <h4>{{ number_format($income) }}</h4>
                                    Income
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="#" class="text-muted text-decoration-none fw-medium">
                                <div class="alert-primary alert py-3 px-4 rounded-3">
                                    <h4>{{ $pending_orders }}</h4>
                                    Pending Orders
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="#" class="text-muted text-decoration-none fw-medium">
                                <div class="alert alert-secondary py-3 px-4 rounded-3">
                                    <h4>{{ $pending_appointments }}</h4>
                                    Pending Appointments
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Success Notification -->
                    @if (session('success'))
                        <div class="alert alert-success mb-3">
                            <p class="text-success m-0 p-0">{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Pending Appointments -->
                    <div class="row mb-5">
                        <div class="col-md-6 mt-3">
                            <h6>Pending Appointments</h6>
                            @if ($appointments->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="m-0">No pending appointments</p>
                                </div>
                            @else
                                @foreach ($appointments as $appointment)
                                    <div class="bg-white mt-2 p-3 rounded-3 d-flex justify-content-between">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3" height="60px" width="60px" alt="Appointment Image">
                                            <div class="ms-3">
                                                <h6 class="text-muted m-0">Date: {{ $appointment->app_date }}</h6>
                                                <p class="fw-semibold m-0">Time: {{ $appointment->app_time->format('H:i A') }}</p>
                                                <p class="m-0 badge badge-pill @if ($appointment->status == 'Pending') alert-warning text-warning @else alert-success text-success @endif">
                                                    {{ $appointment->status }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="align-self-center d-flex">
                                            <!-- Approve Button -->
                                            <form action="{{ route('approve') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $appointment->id }}">
                                                <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure?')">Approve</button>
                                            </form>

                                            <!-- Decline Button -->
                                            <form action="{{ route('decline') }}" method="POST" class="ms-2">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $appointment->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Decline</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Pending Orders -->
                        <div class="col-md-6 mt-3">
                            <h6>Pending Orders</h6>
                            @if ($orders->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="text-danger m-0">No pending orders</p>
                                </div>
                            @else
                                @foreach ($orders as $order)
                                    <div class="bg-white p-3 rounded-3 mb-3 d-flex justify-content-between">
                                        <a href="{{ route('order-details', $order->order_number) }}" class="text-decoration-none text-dark">
                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/order.png') }}" height="60px" width="60px" alt="Order Image">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">Order Number: <span class="small">{{ $order->order_number }}</span></h5>
                                                    <p class="fw-semibold m-0">Order Cost: ₦{{ number_format($order->cost) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="align-self-center d-flex">
                                            <!-- Confirm Button -->
                                            <form action="{{ route('confirm-order') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to confirm this order?')">Confirm</button>
                                            </form>

                                            <!-- Cancel Button -->
                                            <form action="{{ route('cancel-order') }}" method="POST" class="ms-2">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel and delete this order?')">Cancel</button>
                                            </form>
                                        </div>                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

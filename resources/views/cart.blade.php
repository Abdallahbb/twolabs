@extends('layout.uapp')

@section('content')
<main class="py-5">
    <section class="cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success text-center fw-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Empty Cart --}}
                    @if ($carts->isEmpty())
                        <div class="alert alert-warning text-center py-5">
                            <h4 class="mb-4">Your cart is currently empty.</h4>
                            <a href="{{ route('services') }}" class="btn btn-success px-4 py-2 rounded-pill">Shop Now</a>
                        </div>
                    @else
                        {{-- Cart Table --}}
                        <div class="table-responsive bg-white p-4 rounded-4 shadow-sm mb-4">
                            <table class="table align-middle table-bordered text-center mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($carts as $cart)
                                        @php $total += $cart->product->price * $cart->quantity; @endphp
                                        <tr>
                                            <!-- Product Image -->
                                            <td>
                                                <a href="{{ route('product', $cart->product->id) }}">
                                                    <img src="{{ $cart->product->image }}" alt="Product" class="img-thumbnail rounded-3" width="80" height="80">
                                                </a>
                                            </td>

                                            <!-- Product Name -->
                                            <td>
                                                <a href="{{ route('product', $cart->product->id) }}" class="text-decoration-none text-dark fw-semibold">
                                                    {{ $cart->product->name }}
                                                </a>
                                            </td>

                                            <!-- Unit Price -->
                                            <td class="fw-medium text-danger">
                                                ₦{{ number_format($cart->product->price) }}
                                            </td>

                                            <!-- Quantity Controls -->
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <form action="{{ route('cartminus') }}" method="POST" class="me-2">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                                                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                        <button type="submit" class="btn btn-outline-secondary {{ $cart->quantity < 2 ? 'disabled' : '' }}">-</button>
                                                    </form>

                                                    <input type="text" class="form-control text-center bg-light border-0" value="{{ $cart->quantity }}" readonly style="width: 60px;">

                                                    <form action="{{ route('cartplus') }}" method="POST" class="ms-2">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                                                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                        <button type="submit" class="btn btn-outline-secondary {{ $cart->quantity > 9 ? 'disabled' : '' }}">+</button>
                                                    </form>
                                                </div>
                                            </td>

                                            <!-- Total Price -->
                                            <td class="fw-semibold">
                                                ₦{{ number_format($cart->product->price * $cart->quantity) }}
                                            </td>

                                            <!-- Remove Item -->
                                            <td>
                                                <a href="{{ route('deleteCart', $cart->id) }}" onclick="return confirm('Do you want to delete?')" class="text-danger">
                                                    <i class="fa fa-times fs-5"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Cart Totals --}}
                        <div class="row justify-content-end">
                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white p-4 rounded-4 shadow-sm">
                                    <h5 class="mb-3">Cart Summary</h5>
                                    <ul class="list-group list-group-flush mb-4">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>Subtotal</span>
                                            <span>₦{{ number_format($total) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>V.A.T</span>
                                            <span>₦250</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between fw-bold">
                                            <span>Total</span>
                                            <span>₦{{ number_format($total + 250) }}</span>
                                        </li>
                                    </ul>
                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-dark w-100 py-2 rounded-pill">Proceed to Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</main>
@endsection

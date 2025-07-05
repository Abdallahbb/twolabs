<div>
    <div class="bg-white rounded-3 p-3">
        <!-- Navigation Header -->
        <div>
            <h4 class="fs-6">Navigation Menu</h4>
        </div>

        <!-- Navigation Links -->
        <div class="py-3">
            <p>
                <a href="{{ route('dashboard') }}" class="@if(Route::is('dashboard')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Home
                </a>
            </p>
            <p>
                <a href="{{ route('shops-product') }}" class="@if(Route::is('shops-product')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Products
                </a>
            </p>
            <p>
                <a href="{{ route('add') }}" class="@if(Route::is('add')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Add Product
                </a>
            </p>
            <p>
                <a href="{{ route('appointments') }}" class="@if(Route::is('appointments')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Appointments
                </a>
            </p>
            <p>
                <a href="{{ route('pending_orders') }}" class="@if(Route::is('pending_orders')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Pending Orders
                </a>
            </p>
            <p>
                <a href="{{ route('orders') }}" class="@if(Route::is('orders')) text-success @else text-muted @endif text-decoration-none">
                    <i class="icon-home"></i> Completed Orders
                </a>
            </p>

            <!-- Optional Seller Info (Uncomment if needed) -->
            {{--
            <p><i class="icon-mail"></i> {{ $seller->email }}</p>
            <p><i class="icon-phone"></i> {{ $seller->phone }}</p>
            <p><i class="icon-flag"></i> {{ $seller->country ?? 'Country not set' }}</p>
            <p><i class="icon-map"></i> {{ $seller->city ?? 'City not set' }}</p>
            --}}
        </div>
    </div>
</div>

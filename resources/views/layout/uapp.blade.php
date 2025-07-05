<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <title>Comprehensive Eye Clinic</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">
    <!-- Header Section -->
    <nav class="header navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a href="/" class="navbar-brand fw-bold text-dark">
                <i class="fas fa-eye me-2"></i> TWOLABS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-capitalize">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user_dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book') }}">Appointments</a>
                    </li>

                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                            @if (!Auth::check())
                                <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li>
                            @endif
                            <li><a class="dropdown-item" href="/#doctors">Doctors</a></li>
                            <li><a class="dropdown-item" href="/#review">Review</a></li>
                        </ul>
                    </li>

                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                Cart
                                <span class="badge bg-success">
                                    {{ \App\Models\Cart::where('user_id', Auth::id())->where('completed', '0')->count() }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger ms-2" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-sm btn-dark ms-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Header -->

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>

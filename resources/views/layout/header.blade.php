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

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
      .navbar {
    display: flex;
    align-items: center;
    gap: 20px;
}

.navbar a,
.navbar .dropdown {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    position: relative;
}

/* Dropdown Styles */
.dropdown {
    cursor: pointer;
}

.dropdown-toggle::after {
    content: " \f107";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-left: 5px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 150px;
    top: 120%;
    left: 0;
    border-radius: 5px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu a {
    display: block;
    padding: 10px 15px;
    color: #333;
}

.dropdown-menu a:hover {
    background-color: #f5f5f5;
}

/* Login Button Aligned with Nav */
.login-btn {
    background-color: #fff;
    color: #16a085 !important;
    padding: 6px 16px;
    border-radius: 5px;
    border: 2px solid #16a085;
    font-weight: 500;
    display: inline-block;
    line-height: 1.5;
    transition: background-color 0.2s ease-in-out;
}

.login-btn:hover {
    background-color: #16a085;
    color: #fff !important;
}

    </style>
</head>

<body>

    <!-- Header Section -->
    <header class="header">
        <a href="{{ route('index') }}" class="logo"><i class="fas fa-eye"></i> TWOLABS</a>

            <nav class="navbar">
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('services') }}">Products</a>
                <a href="{{ route('book') }}">Appointments</a>

                <div class="dropdown">
                    <a href="#" class="dropdown-toggle">More</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('about') }}">About</a>
                        <a href="/#doctors">Doctors</a>
                        <a href="/#review">Reviews</a>
                    </div>
                </div>

                @if (Auth::check())
                    <a href="{{ route('cart') }}">
                        Cart <span class="text-success fw-bold rounded-2 p-1">
                            {{ \App\Models\Cart::where('user_id', Auth::id())->where('completed', '0')->count() }}
                        </span>
                    </a>
                    <a href="{{ route('user_dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                @endif
            </nav>


        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- End of Header -->

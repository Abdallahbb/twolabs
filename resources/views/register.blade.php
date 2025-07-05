@extends('layout.uapp')

@section('content')

<!-- Registration Section -->
<section class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="bg-white p-5 rounded-2 shadow-sm">
                <form action="{{ route('registeraction') }}" method="POST">
                    @csrf
                    <h3 class="mb-4">Sign Up</h3>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}" 
                            placeholder="Enter your full name"
                            class="form-control @error('name') is-invalid @enderror" 
                            required
                        >
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            value="{{ old('phone') }}" 
                            placeholder="Enter your phone number"
                            class="form-control @error('phone') is-invalid @enderror" 
                            required
                        >
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="Enter your email"
                            class="form-control @error('email') is-invalid @enderror" 
                            required
                        >
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Create a password"
                                class="form-control @error('password') is-invalid @enderror" 
                                pattern="^[A-Za-z0-9!@#$%^&*_,.?]{8,}$"
                                title="Password must be at least 8 characters long and contain only letters, numbers, and special characters."
                                required
                            >
                            <span class="input-group-text bg-white border-start-0" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                                <i id="eyeIcon" class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Submit -->
                    <button type="submit" class="btn btn-dark w-100">Sign Up</button>

                    <!-- Link to login -->
                    <p class="mt-3 text-center">
                        Already have an account? 
                        <a href="{{ route('login') }}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        }
    }
</script>

@endsection

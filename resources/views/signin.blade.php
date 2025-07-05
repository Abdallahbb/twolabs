@extends('layout.uapp')

@section('content')

<!-- Sign In Section -->
<section class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="bg-white p-5 rounded-2 shadow-sm">
                <form action="{{ route('loginaction') }}" method="POST">
                    @csrf
                    <h3 class="mb-4">Sign In</h3>

                    <!-- Email Input -->
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

                    <!-- Password Input -->
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password"
                                class="form-control"
                                required
                            >
                            <span class="input-group-text bg-white border-start-0" style="cursor: pointer;" onclick="togglePasswordVisibility()">
                                <i id="eyeIcon" class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger mt-2 mb-0">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>



                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-dark w-100">Sign In</button>

                    <!-- Register Prompt -->
                    <p class="mt-3 text-center">
                        Don’t have an account? 
                        <a href="{{ route('register') }}">Register</a>
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

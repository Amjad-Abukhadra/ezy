@extends('layouts.app')

@section('title', 'Login | Ezy')

@section('content')
    <div class="container vh-100">
        <div class="row h-100">
            <!-- Login form on the left -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card shadow p-4 w-75" style="border-radius: 2.5rem;">
                    <h3 class="mb-4 text-center">Welcome Back</h3>

                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn text-white fw-semibold"
                            style="background-color: #fd7e14; width: 100%; border-radius: 2rem;">Login</button>
                    </form>

                    <!-- Social Sign-in -->
                    <div class="mt-4 text-center">
                        <p class="mb-3">Or sign in with</p>
                        <div class="d-flex justify-content-center gap-3">
                            <!-- Google -->
                            <a class="btn btn-outline-danger d-flex align-items-center gap-2 px-4 rounded-pill">
                                <i class="fab fa-google"></i> Google
                            </a>
                            <!-- Facebook -->
                            <a class="btn btn-outline-primary d-flex align-items-center gap-2 px-4 rounded-pill">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <!-- Apple -->
                            <a class="btn btn-outline-dark d-flex align-items-center gap-2 px-4 rounded-pill">
                                <i class="fab fa-apple"></i> Apple
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image on the right -->
            <div class="col-md-6 d-none d-md-flex p-0"
                style="height: 100vh; overflow: hidden; justify-content: center; align-items: center;">
                <img src="{{ asset('photos/Frame.png') }}" alt="Login Image" class="img-fluid"
                    style="max-height: 100%; width: auto;">
            </div>
        </div>
    </div>
@endsection



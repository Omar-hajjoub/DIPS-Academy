@extends('layouts.auth')

@section('title', 'Forgot Password - DIPS Academy')

@section('content')
<div class="premium-auth-container" x-data="{ loading: false }">
    {{-- Left Panel - Branding --}}
    <div class="premium-auth-branding">
        <div class="branding-content">
            {{-- Animated Background --}}
            <div class="animated-bg">
                <div class="gradient-orb orb-1"></div>
                <div class="gradient-orb orb-2"></div>
                <div class="gradient-orb orb-3"></div>
            </div>

            {{-- Logo --}}
            <div class="branding-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="8" fill="url(#logoGradient)"/>
                        <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                            <linearGradient id="logoGradient" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3B82F6"/>
                                <stop offset="1" stop-color="#1E40AF"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <span class="logo-text">DIPS Academy</span>
            </div>

            {{-- Hero Content --}}
            <div class="branding-hero">
                <h1 class="hero-title">
                    Reset Your <br>
                    <span class="gradient-text">Password</span>
                </h1>
                <p class="hero-description">
                    Don't worry, it happens to the best of us. Enter your email and we'll send 
                    you a link to reset your password.
                </p>
            </div>

            {{-- Security Info --}}
            <div class="branding-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Secure Process</strong>
                        <span>256-bit encrypted connection</span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Check Your Email</strong>
                        <span>Reset link sent instantly</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Panel - Form --}}
    <div class="premium-auth-form-panel">
        <div class="form-container">
            {{-- Mobile Logo --}}
            <div class="mobile-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="8" fill="url(#logoGradientMobile)"/>
                        <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                            <linearGradient id="logoGradientMobile" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3B82F6"/>
                                <stop offset="1" stop-color="#1E40AF"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <span class="logo-text">DIPS Academy</span>
            </div>

            {{-- Form Header --}}
            <div class="form-header">
                <h2 class="form-title">Forgot password?</h2>
                <p class="form-subtitle">No worries, we'll send you reset instructions</p>
            </div>

            {{-- Success Message --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}" @submit="loading = true">
                @csrf
                
                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input @error('email') form-input-error @enderror"
                        value="{{ old('email') }}"
                        placeholder="name@example.com"
                        required 
                        autofocus
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <button type="submit" class="btn-primary" :disabled="loading">
                        <span x-show="!loading">Send Reset Link</span>
                        <span x-show="loading">Sending...</span>
                    </button>
                </div>
            </form>

            {{-- Back to Login --}}
            <div class="auth-footer">
                <p>
                    <a href="{{ route('login') }}" class="auth-link" style="justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="transform: rotate(180deg);">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                        Back to login
                    </a>
                </p>
            </div>

            {{-- Footer --}}
            <div class="form-footer">
                <p>&copy; {{ date('Y') }} DIPS Academy. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
@endsection

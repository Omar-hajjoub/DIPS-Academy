@extends('layouts.auth')

@section('title', 'Create Account - DIPS Academy')

@section('content')
<div class="premium-auth-container" x-data="{ 
    showPassword: false,
    showConfirmPassword: false,
    loading: false,
    password: '',
    passwordStrength: 0,
    passwordFeedback: '',
    checkPasswordStrength() {
        const pwd = this.password;
        let strength = 0;
        
        if (pwd.length >= 8) strength += 25;
        if (pwd.length >= 12) strength += 10;
        if (/[a-z]/.test(pwd) && /[A-Z]/.test(pwd)) strength += 25;
        if (/\d/.test(pwd)) strength += 20;
        if (/[^a-zA-Z0-9]/.test(pwd)) strength += 20;
        
        this.passwordStrength = Math.min(strength, 100);
        
        if (this.passwordStrength < 30) {
            this.passwordFeedback = 'Weak - Add more characters';
        } else if (this.passwordStrength < 60) {
            this.passwordFeedback = 'Fair - Add numbers or symbols';
        } else if (this.passwordStrength < 80) {
            this.passwordFeedback = 'Good - Almost there!';
        } else {
            this.passwordFeedback = 'Strong - Excellent password!';
        }
    }
}">
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
                    Join Our <br>
                    <span class="gradient-text">Learning Community</span>
                </h1>
                <p class="hero-description">
                    Create your free account and get access to thousands of courses taught by expert 
                    instructors from around the world.
                </p>
            </div>

            {{-- Features --}}
            <div class="branding-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Join 50,000+ Students</strong>
                        <span>Be part of our global community</span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Free Courses Available</strong>
                        <span>Start learning without cost</span>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Learn Anywhere</strong>
                        <span>Mobile-friendly platform</span>
                    </div>
                </div>
            </div>

            {{-- Trust Badges --}}
            <div class="trust-badges">
                <div class="badge">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                    <span>Verified</span>
                </div>
                <div class="badge">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <span>Secure</span>
                </div>
                <div class="badge">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>24/7 Support</span>
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
                <h2 class="form-title">Create your account</h2>
                <p class="form-subtitle">Start your learning journey today</p>
            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Register Form --}}
            <form method="POST" action="{{ route('register') }}" @submit="loading = true">
                @csrf
                
                {{-- Full Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input @error('name') form-input-error @enderror"
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        required 
                        autofocus
                    >
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

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
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-password-wrapper">
                        <input 
                            :type="showPassword ? 'text' : 'password'" 
                            id="password" 
                            name="password" 
                            class="form-input @error('password') form-input-error @enderror"
                            placeholder="••••••••"
                            required
                            x-model="password"
                            @input="checkPasswordStrength()"
                            style="padding-right: 3rem;"
                        >
                        <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    
                    {{-- Password Strength Indicator --}}
                    <div class="password-strength-container" x-show="password.length > 0" x-transition>
                        <div class="strength-bar-container">
                            <div class="strength-bar" 
                                 :style="'width: ' + passwordStrength + '%'"
                                 :class="{
                                     'weak': passwordStrength < 30,
                                     'fair': passwordStrength >= 30 && passwordStrength < 60,
                                     'good': passwordStrength >= 60 && passwordStrength < 80,
                                     'strong': passwordStrength >= 80
                                 }">
                            </div>
                        </div>
                        <p class="strength-feedback" x-text="passwordFeedback"></p>
                    </div>
                    
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-password-wrapper">
                        <input 
                            :type="showConfirmPassword ? 'text' : 'password'" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-input"
                            placeholder="••••••••"
                            required
                            style="padding-right: 3rem;"
                        >
                        <button type="button" class="password-toggle" @click="showConfirmPassword = !showConfirmPassword">
                            <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Terms & Conditions --}}
                <div class="form-group">
                    <div class="form-checkbox-group">
                        <input type="checkbox" id="terms" name="terms" class="form-checkbox" required>
                        <label for="terms" class="form-checkbox-label">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                    @error('terms')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <button type="submit" class="btn-primary" :disabled="loading">
                        <span x-show="!loading">Create Account</span>
                        <span x-show="loading">Creating account...</span>
                    </button>
                </div>
            </form>

            {{-- Divider --}}
            <div class="auth-divider">
                <span>or sign up with</span>
            </div>

            {{-- Social Login --}}
            <div class="social-login">
                <button type="button" class="social-btn" aria-label="Sign up with Google">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span>Google</span>
                </button>
                <button type="button" class="social-btn" aria-label="Sign up with Facebook">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.469h-2.796v8.385C19.612 22.954 24 17.99 24 12z" fill="#1877F2"/>
                    </svg>
                    <span>Facebook</span>
                </button>
            </div>

            {{-- Login Link --}}
            <div class="auth-footer">
                <p>Already have an account? 
                    <a href="{{ route('login') }}" class="auth-link">
                        Sign in
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
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

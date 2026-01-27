<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DIPS Academy')</title>
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Custom Auth Styles --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    
    {{-- Additional Styles --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--auth-bg-dark);
            min-height: 100vh;
        }
        
        /* Form Elements for Blade (non-Filament) */
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--auth-text-primary);
            margin-bottom: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: var(--auth-bg-card);
            border: 1px solid var(--auth-glass-border);
            border-radius: var(--auth-radius-lg);
            color: var(--auth-text-primary);
            font-size: 0.9375rem;
            transition: all var(--auth-transition-normal);
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--auth-primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        
        .form-input::placeholder {
            color: var(--auth-text-muted);
        }
        
        .form-input-error {
            border-color: var(--auth-error) !important;
        }
        
        .form-error {
            color: var(--auth-error);
            font-size: 0.8125rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .form-hint {
            display: flex;
            justify-content: flex-end;
            margin-top: 0.5rem;
        }
        
        .form-hint a {
            font-size: 0.875rem;
            color: var(--auth-primary-light);
            text-decoration: none;
            transition: color var(--auth-transition-fast);
        }
        
        .form-hint a:hover {
            color: var(--auth-text-primary);
        }
        
        .form-checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .form-checkbox {
            width: 18px;
            height: 18px;
            accent-color: var(--auth-primary);
            cursor: pointer;
        }
        
        .form-checkbox-label {
            font-size: 0.875rem;
            color: var(--auth-text-secondary);
        }
        
        .form-checkbox-label a {
            color: var(--auth-primary-light);
            text-decoration: none;
        }
        
        .form-checkbox-label a:hover {
            color: var(--auth-text-primary);
        }
        
        .btn-primary {
            width: 100%;
            padding: 0.875rem 1.5rem;
            font-size: 0.9375rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, var(--auth-primary) 0%, var(--auth-secondary) 100%);
            border: none;
            border-radius: var(--auth-radius-lg);
            cursor: pointer;
            transition: all var(--auth-transition-normal);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--auth-shadow-glow), var(--auth-shadow-lg);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        
        .input-password-wrapper {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--auth-text-secondary);
            cursor: pointer;
            padding: 0.25rem;
            transition: color var(--auth-transition-fast);
        }
        
        .password-toggle:hover {
            color: var(--auth-text-primary);
        }
        
        .password-toggle svg {
            width: 20px;
            height: 20px;
        }
        
        /* Alert Messages */
        .alert {
            padding: 1rem;
            border-radius: var(--auth-radius-lg);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--auth-error);
        }
        
        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: var(--auth-success);
        }
        
        /* Admin Notice Style */
        .admin-notice {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.8125rem;
            color: var(--auth-text-muted);
            padding: 0.75rem;
            background: rgba(59, 130, 246, 0.05);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: var(--auth-radius-lg);
        }
        
        .notice-icon {
            width: 16px;
            height: 16px;
            color: var(--auth-primary);
        }
    </style>
    
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @yield('content')
</body>
</html>

@extends('layouts.auth')

@section('title', 'Dashboard - DIPS Academy')

@section('content')
<div style="min-height: 100vh; background: var(--auth-bg-dark); display: flex; flex-direction: column;">
    {{-- Header --}}
    <header style="background: var(--auth-bg-surface); border-bottom: 1px solid var(--auth-glass-border); padding: 1rem 2rem;">
        <div style="max-width: 1280px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            {{-- Logo --}}
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 40px; height: 40px;">
                    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="8" fill="url(#logoGradientDash)"/>
                        <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <defs>
                            <linearGradient id="logoGradientDash" x1="0" y1="0" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3B82F6"/>
                                <stop offset="1" stop-color="#1E40AF"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <span style="font-size: 1.25rem; font-weight: 700; color: var(--auth-text-primary);">DIPS Academy</span>
            </div>

            {{-- User Menu --}}
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span style="color: var(--auth-text-secondary);">Welcome, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="padding: 0.5rem 1rem; background: var(--auth-bg-card); border: 1px solid var(--auth-glass-border); border-radius: var(--auth-radius-lg); color: var(--auth-text-primary); cursor: pointer; font-size: 0.875rem; transition: all 0.3s;">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main style="flex: 1; padding: 2rem; max-width: 1280px; margin: 0 auto; width: 100%;">
        <h1 style="font-size: 2rem; font-weight: 700; color: var(--auth-text-primary); margin-bottom: 0.5rem;">
            Welcome back, {{ Auth::user()->name }}!
        </h1>
        <p style="color: var(--auth-text-secondary); margin-bottom: 2rem;">
            Ready to continue your learning journey?
        </p>

        {{-- Stats Cards --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div style="background: var(--auth-bg-surface); border: 1px solid var(--auth-glass-border); border-radius: var(--auth-radius-xl); padding: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--auth-primary), var(--auth-secondary)); border-radius: var(--auth-radius-lg); display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342" />
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 0.875rem; color: var(--auth-text-secondary);">Enrolled Courses</p>
                        <p style="font-size: 1.5rem; font-weight: 700; color: var(--auth-text-primary);">0</p>
                    </div>
                </div>
            </div>

            <div style="background: var(--auth-bg-surface); border: 1px solid var(--auth-glass-border); border-radius: var(--auth-radius-xl); padding: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--auth-success), #059669); border-radius: var(--auth-radius-lg); display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 0.875rem; color: var(--auth-text-secondary);">Completed</p>
                        <p style="font-size: 1.5rem; font-weight: 700; color: var(--auth-text-primary);">0</p>
                    </div>
                </div>
            </div>

            <div style="background: var(--auth-bg-surface); border: 1px solid var(--auth-glass-border); border-radius: var(--auth-radius-xl); padding: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--auth-warning), #D97706); border-radius: var(--auth-radius-lg); display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 0.875rem; color: var(--auth-text-secondary);">Hours Learned</p>
                        <p style="font-size: 1.5rem; font-weight: 700; color: var(--auth-text-primary);">0</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Empty State --}}
        <div style="background: var(--auth-bg-surface); border: 1px solid var(--auth-glass-border); border-radius: var(--auth-radius-xl); padding: 3rem; text-align: center;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" style="width: 64px; height: 64px; color: var(--auth-text-muted); margin: 0 auto 1rem;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--auth-text-primary); margin-bottom: 0.5rem;">
                Start Your Learning Journey
            </h2>
            <p style="color: var(--auth-text-secondary); margin-bottom: 1.5rem;">
                Browse our catalog and enroll in your first course today.
            </p>
            <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--auth-primary), var(--auth-secondary)); border-radius: var(--auth-radius-lg); color: white; text-decoration: none; font-weight: 500; transition: all 0.3s;">
                Browse Courses
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 16px; height: 16px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </main>

    {{-- Footer --}}
    <footer style="background: var(--auth-bg-surface); border-top: 1px solid var(--auth-glass-border); padding: 1.5rem 2rem; text-align: center;">
        <p style="color: var(--auth-text-muted); font-size: 0.875rem;">
            &copy; {{ date('Y') }} DIPS Academy. All rights reserved.
        </p>
    </footer>
</div>
@endsection

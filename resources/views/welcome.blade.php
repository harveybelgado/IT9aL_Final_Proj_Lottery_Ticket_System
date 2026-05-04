@extends('layout')

@section('content')
    <div style="text-align: center; padding: 4rem 2rem;">
        <h1 style="font-size: 3rem; margin-bottom: 1rem;">Lotto System</h1>
        <p style="font-size: 1.25rem; color: var(--text-muted); margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            Experience the most transparent and efficient lotto management system. Simple, secure, and reliable.
        </p>
        
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
                    Log in to Start
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline" style="padding: 1rem 2rem; font-size: 1.1rem;">
                        Create Account
                    </a>
                @endif
            @endauth
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 4rem;">
        <div class="card" style="text-align: center;">
            <div style="background: #eff6ff; color: var(--primary); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3>Fair Draws</h3>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Our random generation algorithm ensures every draw is 100% fair and unbiased.</p>
        </div>
        <div class="card" style="text-align: center;">
            <div style="background: #f0fdf4; color: #10b981; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3>Instant Claims</h3>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Winning tickets can be claimed immediately through our streamlined verification process.</p>
        </div>
        <div class="card" style="text-align: center;">
            <div style="background: #fff7ed; color: #f59e0b; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h3>Secure Platform</h3>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Your data and transactions are protected by industry-standard security protocols.</p>
        </div>
    </div>
@endsection

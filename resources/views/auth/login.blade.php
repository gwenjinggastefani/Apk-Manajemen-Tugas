@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f1f5f9' fill-opacity='0.6'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.05),
            0 0 0 1px rgba(0, 0, 0, 0.02);
        overflow: hidden;
        max-width: 420px;
        width: 100%;
        position: relative;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .login-card:hover {
        transform: translateY(-8px);
        box-shadow: 
            0 35px 70px rgba(0, 0, 0, 0.08),
            0 0 0 1px rgba(0, 0, 0, 0.03);
    }

    .card-header {
        background: white;
        color: #1e293b;
        padding: 40px 40px 20px;
        text-align: center;
        border: none;
        position: relative;
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #64748b, transparent);
    }

    .card-header h4 {
        margin: 0;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 8px;
        color: #0f172a;
        position: relative;
    }

    .card-header p {
        margin: 0;
        color: #64748b;
        font-size: 15px;
        font-weight: 400;
    }

    .card-body {
        padding: 30px 40px 40px;
    }

    .form-group {
        position: relative;
        margin-bottom: 28px;
    }

    .form-control {
        width: 100%;
        border: 2px solid #f1f5f9;
        border-radius: 12px;
        padding: 18px 20px;
        font-size: 16px;
        background: #fefefe;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        outline: none;
        font-weight: 500;
        color: #1e293b;
    }

    .form-control:focus {
        border-color: #3b82f6;
        background: white;
        box-shadow: 
            0 0 0 3px rgba(59, 130, 246, 0.05),
            0 4px 12px rgba(0, 0, 0, 0.04);
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus) {
        border-color: #e2e8f0;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
        font-size: 14px;
        letter-spacing: 0.025em;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin: 24px 0;
        padding: 12px 0;
    }

    .form-check-input {
        margin-right: 12px;
        width: 18px;
        height: 18px;
        border: 2px solid #d1d5db;
        border-radius: 4px;
        accent-color: #3b82f6;
        transition: all 0.2s ease;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
        transform: scale(1.1);
    }

    .form-check-label {
        font-size: 14px;
        color: #6b7280;
        cursor: pointer;
        user-select: none;
        font-weight: 500;
    }

    .btn-login {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        border: none;
        border-radius: 12px;
        padding: 18px 24px;
        font-size: 16px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.025em;
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(30, 41, 59, 0.2);
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    }

    .btn-login:hover::before {
        left: 100%;
    }

    .btn-login:active {
        transform: translateY(-1px);
    }

    .btn-login:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .alert {
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
        border: 1px solid #fecaca;
        color: #dc2626;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 24px;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.05);
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }

    .alert li {
        margin: 4px 0;
        line-height: 1.5;
    }

    .forgot-password {
        text-align: center;
        margin-top: 28px;
    }

    .forgot-password a {
        color: #3b82f6;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        padding: 8px 0;
    }

    .forgot-password a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 4px;
        left: 50%;
        background: #3b82f6;
        transition: all 0.3s ease;
    }

    .forgot-password a:hover {
        color: #1d4ed8;
        transform: translateY(-1px);
    }

    .forgot-password a:hover::after {
        width: 100%;
        left: 0;
    }

    .login-footer {
        text-align: center;
        padding: 24px 40px 30px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-top: 1px solid #e2e8f0;
        position: relative;
    }

    .login-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 1px;
        background: linear-gradient(90deg, transparent, #cbd5e1, transparent);
    }

    .login-footer p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        font-weight: 500;
    }

    .login-footer a {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        padding: 2px 0;
    }

    .login-footer a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background: #3b82f6;
        transition: all 0.3s ease;
    }

    .login-footer a:hover {
        color: #1d4ed8;
        transform: translateY(-1px);
    }

    .login-footer a:hover::after {
        width: 100%;
        left: 0;
    }

    /* Floating elements */
    .floating-element {
        position: absolute;
        background: rgba(59, 130, 246, 0.03);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
        pointer-events: none;
    }

    .floating-element:nth-child(1) {
        width: 120px;
        height: 120px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
        width: 80px;
        height: 80px;
        top: 70%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-element:nth-child(3) {
        width: 60px;
        height: 60px;
        bottom: 15%;
        left: 8%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.7; }
        50% { transform: translateY(-20px) scale(1.1); opacity: 0.4; }
    }

    /* Spinner */
    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
        border: 0.125em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        animation: spin 0.75s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .d-none { display: none; }
    .me-2 { margin-right: 0.5rem; }

    /* Responsive */
    @media (max-width: 576px) {
        .login-container {
            padding: 16px;
        }
        
        .card-body {
            padding: 24px 28px 32px;
        }

        .card-header {
            padding: 32px 28px 16px;
        }
        
        .login-footer {
            padding: 20px 28px 24px;
        }
        
        .card-header h4 {
            font-size: 24px;
        }

        .form-control {
            padding: 16px 18px;
        }

        .btn-login {
            padding: 16px 20px;
        }
    }

    /* Input animations */
    .form-group {
        animation: slideIn 0.6s ease-out;
        animation-fill-mode: both;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .btn-login { animation: slideIn 0.6s ease-out 0.4s both; }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="login-container">
    <!-- Floating decorative elements -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>

    <div class="login-card">
        <div class="card-header">
            <h4>Welcome Back</h4>
            <p>Please sign in to your account</p>
        </div>
        
        <div class="card-body">
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" 
                           name="email" 
                           class="form-control" 
                           id="email"
                           value="{{ old('email') }}"
                           required 
                           autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           name="password" 
                           class="form-control" 
                           id="password"
                           required>
                </div>

                <div class="form-check">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="remember" 
                           id="remember" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <span id="btnText">Sign In</span>
                    <span id="btnSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2"></span>
                        Signing in...
                    </span>
                </button>
            </form>

            @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div>
            @endif
        </div>

        @if (Route::has('register'))
            <div class="login-footer">
                <p>Don't have an account? <a href="{{ route('register') }}">Create one here</a></p>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');

    form.addEventListener('submit', function(e) {
        loginBtn.disabled = true;
        btnText.classList.add('d-none');
        btnSpinner.classList.remove('d-none');
    });

    // Enhanced input interactions
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach((input, index) => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
            this.parentElement.style.transition = 'transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });

        // Ripple effect on focus
        input.addEventListener('mousedown', function(e) {
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(59, 130, 246, 0.1)';
            ripple.style.pointerEvents = 'none';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = e.clientX - rect.left - size / 2 + 'px';
            ripple.style.top = e.clientY - rect.top - size / 2 + 'px';
            
            this.parentElement.style.position = 'relative';
            this.parentElement.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection
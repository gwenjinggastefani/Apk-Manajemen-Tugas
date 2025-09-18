@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Floating decorative elements -->
    <div class="absolute w-32 h-32 bg-blue-100/30 rounded-full animate-pulse -left-16 top-1/4 opacity-50"></div>
    <div class="absolute w-20 h-20 bg-blue-100/20 rounded-full animate-bounce right-8 bottom-1/4 opacity-30"></div>
    <div class="absolute w-16 h-16 bg-blue-100/40 rounded-full animate-pulse left-4 bottom-1/3 opacity-40"></div>

    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:-translate-y-1 max-w-md w-full relative z-10">
        <!-- Card Header -->
        <div class="bg-white px-8 pt-8 pb-4 text-center relative">
            <h4 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back</h4>
            <p class="text-gray-500 text-sm font-medium">Please sign in to your account</p>
            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-0.5 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
        </div>
        
        <!-- Card Body -->
        <div class="px-8 pb-8 pt-4">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6 text-sm font-medium">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-5">
                @csrf
                
                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block font-semibold text-gray-700 text-sm">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-base font-medium text-gray-700 bg-gray-50 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:outline-none hover:border-gray-300 hover:bg-white transition-all duration-200" 
                        id="email"
                        value="{{ old('email') }}"
                        required 
                        autofocus
                        placeholder="Enter your email">
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block font-semibold text-gray-700 text-sm">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-base font-medium text-gray-700 bg-gray-50 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:outline-none hover:border-gray-300 hover:bg-white transition-all duration-200" 
                        id="password"
                        required
                        placeholder="Enter your password">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center space-x-3 py-2">
                    <input 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-2 border-gray-300 focus:ring-blue-500 focus:ring-2 rounded" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-sm font-medium text-gray-600 cursor-pointer" for="remember">
                        Remember me
                    </label>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-gray-800 to-gray-700 border-none rounded-xl py-3 text-base font-semibold text-white transition-all duration-200 ease-in-out cursor-pointer hover:from-gray-900 hover:to-gray-800 hover:shadow-lg active:translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed" 
                    id="loginBtn">
                    
                    <span class="flex items-center justify-center" id="btnText">
                        <span class="hidden mr-2" id="spinner">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        Sign In
                    </span>
                </button>
            </form>

            @if (Route::has('password.request'))
                <div class="text-center mt-6">
                    <a href="{{ route('password.request') }}" 
                       class="text-blue-600 hover:text-blue-700 text-sm font-semibold transition-colors duration-200">
                        Forgot your password?
                    </a>
                </div>
            @endif
        </div>

        @if (Route::has('register'))
            <div class="bg-gray-50 border-t border-gray-200 px-8 pb-6 pt-4 text-center relative">
                <p class="text-sm font-medium text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" 
                       class="text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-200">
                        Create one here
                    </a>
                </p>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');
    const spinner = document.getElementById('spinner');

    form.addEventListener('submit', function(e) {
        loginBtn.disabled = true;
        spinner.classList.remove('hidden');
    });
});
</script>
@endsection
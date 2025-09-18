<nav class="fixed top-0 w-full z-50 bg-white/95 backdrop-blur-xl border-b border-black/5 
           shadow-[0_2px_20px_rgba(0,0,0,0.03)] py-4 transition-all duration-500 
           navbar-enhanced">
    <!-- Background overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/[0.01] to-slate-800/[0.01] pointer-events-none"></div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-blue-500 to-emerald-400 
                transition-all duration-300 w-0 navbar-scroll-indicator 
                shadow-[0_0_10px_rgba(6,255,165,0.5)]"></div>

    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Brand -->
            <a href="{{ url('/') }}" 
               class="text-2xl font-black text-slate-900 hover:text-slate-700 
                      transition-all duration-300 hover:-translate-y-0.5 tracking-tight
                      relative group">
                <span class="relative z-10">Project Manager</span>
                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-blue-700 
                            transition-all duration-500 group-hover:w-full rounded-full"></div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-1">
                <!-- Projects -->
                <a href="{{ route('projects.index') }}" 
                   class="nav-link px-5 py-3 text-slate-600 font-semibold text-sm tracking-wide
                          hover:text-slate-900 hover:bg-blue-500/5 hover:-translate-y-0.5
                          transition-all duration-300 rounded-xl relative group
                          {{ request()->is('projects*') ? 'text-blue-600 bg-gradient-to-r from-blue-500/10 to-blue-700/5 shadow-[0_2px_8px_rgba(59,130,246,0.15)]' : '' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/8 to-slate-800/5 
                                rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="relative z-10">Projects</span>
                    @if(request()->is('projects*'))
                        <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2 w-1 h-1 
                                    bg-blue-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Tasks -->
                <a href="{{ route('tasks.index') }}" 
                   class="nav-link px-5 py-3 text-slate-600 font-semibold text-sm tracking-wide
                          hover:text-slate-900 hover:bg-blue-500/5 hover:-translate-y-0.5
                          transition-all duration-300 rounded-xl relative group
                          {{ request()->is('tasks*') ? 'text-blue-600 bg-gradient-to-r from-blue-500/10 to-blue-700/5 shadow-[0_2px_8px_rgba(59,130,246,0.15)]' : '' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/8 to-slate-800/5 
                                rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="relative z-10">Tasks</span>
                    @if(request()->is('tasks*'))
                        <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2 w-1 h-1 
                                    bg-blue-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Teams -->
                <a href="{{ route('teams.index') }}" 
                   class="nav-link px-5 py-3 text-slate-600 font-semibold text-sm tracking-wide
                          hover:text-slate-900 hover:bg-blue-500/5 hover:-translate-y-0.5
                          transition-all duration-300 rounded-xl relative group
                          {{ request()->is('teams*') ? 'text-blue-600 bg-gradient-to-r from-blue-500/10 to-blue-700/5 shadow-[0_2px_8px_rgba(59,130,246,0.15)]' : '' }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/8 to-slate-800/5 
                                rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="relative z-10">Teams</span>
                    @if(request()->is('teams*'))
                        <div class="absolute bottom-0.5 left-1/2 transform -translate-x-1/2 w-1 h-1 
                                    bg-blue-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Authentication Section -->
                @auth
                    <div class="relative ml-4 dropdown-container">
                        <button class="flex items-center px-5 py-3 text-slate-600 font-semibold text-sm
                                       hover:text-slate-900 hover:bg-blue-500/5 hover:-translate-y-0.5
                                       transition-all duration-300 rounded-xl relative group dropdown-toggle"
                                onclick="toggleDropdown()">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/8 to-slate-800/5 
                                        rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- User Avatar -->
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-700 rounded-full 
                                        flex items-center justify-center text-white font-bold text-xs
                                        mr-3 uppercase tracking-wider">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            
                            <span class="relative z-10 mr-2">{{ auth()->user()->name }}</span>
                            
                            <!-- Dropdown Arrow -->
                            <svg class="w-3 h-3 transition-transform duration-300 dropdown-arrow" 
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-40 bg-white/98 backdrop-blur-xl 
                                    border border-black/5 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.1)]
                                    p-2 opacity-0 invisible transform scale-95 origin-top-right
                                    transition-all duration-300 dropdown-menu">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        class="w-full text-left px-4 py-3 text-slate-600 font-semibold text-sm
                                               hover:text-slate-900 hover:bg-blue-500/8 
                                               transition-all duration-200 rounded-lg
                                               hover:translate-x-1">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="nav-link px-5 py-3 text-slate-600 font-semibold text-sm tracking-wide
                              hover:text-slate-900 hover:bg-blue-500/5 hover:-translate-y-0.5
                              transition-all duration-300 rounded-xl relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/8 to-slate-800/5 
                                    rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <span class="relative z-10">Login</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2 border-2 border-slate-300/20 rounded-lg
                           hover:border-blue-500/30 hover:bg-blue-500/5 
                           transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500/20
                           mobile-menu-toggle"
                    onclick="toggleMobileMenu()">
                <div class="w-5 h-5 flex flex-col justify-center space-y-1">
                    <span class="block w-full h-0.5 bg-slate-600 transition-all duration-300 hamburger-line-1"></span>
                    <span class="block w-full h-0.5 bg-slate-600 transition-all duration-300 hamburger-line-2"></span>
                    <span class="block w-full h-0.5 bg-slate-600 transition-all duration-300 hamburger-line-3"></span>
                </div>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden mt-4 p-5 bg-white/98 backdrop-blur-xl rounded-xl 
                    shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-black/5
                    opacity-0 invisible transform -translate-y-4 transition-all duration-300
                    mobile-menu">
            <div class="space-y-2">
                <!-- Projects -->
                <a href="{{ route('projects.index') }}" 
                   class="block px-5 py-4 text-slate-600 font-semibold text-sm
                          hover:text-slate-900 hover:bg-blue-500/8 
                          transition-all duration-300 rounded-lg
                          {{ request()->is('projects*') ? 'text-blue-600 bg-blue-500/10' : '' }}">
                    Projects
                </a>

                <!-- Tasks -->
                <a href="{{ route('tasks.index') }}" 
                   class="block px-5 py-4 text-slate-600 font-semibold text-sm
                          hover:text-slate-900 hover:bg-blue-500/8 
                          transition-all duration-300 rounded-lg
                          {{ request()->is('tasks*') ? 'text-blue-600 bg-blue-500/10' : '' }}">
                    Tasks
                </a>

                <!-- Teams -->
                <a href="{{ route('teams.index') }}" 
                   class="block px-5 py-4 text-slate-600 font-semibold text-sm
                          hover:text-slate-900 hover:bg-blue-500/8 
                          transition-all duration-300 rounded-lg
                          {{ request()->is('teams*') ? 'text-blue-600 bg-blue-500/10' : '' }}">
                    Teams
                </a>

                @auth
                    <div class="border-t border-slate-200/50 pt-2 mt-2">
                        <div class="flex items-center px-5 py-3 text-slate-700">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-700 rounded-full 
                                        flex items-center justify-center text-white font-bold text-xs
                                        mr-3 uppercase tracking-wider">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="font-semibold">{{ auth()->user()->name }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="w-full text-left px-5 py-4 text-slate-600 font-semibold text-sm
                                           hover:text-slate-900 hover:bg-red-500/8 hover:text-red-700
                                           transition-all duration-300 rounded-lg ml-0">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="block px-5 py-4 text-slate-600 font-semibold text-sm
                              hover:text-slate-900 hover:bg-blue-500/8 
                              transition-all duration-300 rounded-lg">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom animations yang tidak tersedia di Tailwind */
    @keyframes dropdownSlide {
        from {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulseActive {
        0%, 100% {
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
        }
        50% {
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.25);
        }
    }

    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
        animation: dropdownSlide 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .mobile-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .mobile-menu.show > div > * {
        animation: slideInRight 0.4s ease forwards;
    }

    .mobile-menu.show > div > *:nth-child(1) { animation-delay: 0.1s; }
    .mobile-menu.show > div > *:nth-child(2) { animation-delay: 0.2s; }
    .mobile-menu.show > div > *:nth-child(3) { animation-delay: 0.3s; }
    .mobile-menu.show > div > *:nth-child(4) { animation-delay: 0.4s; }

    .navbar-enhanced.scrolled {
        @apply bg-white/98 shadow-[0_4px_30px_rgba(0,0,0,0.08)] py-3;
    }

    .navbar-enhanced.scrolled .navbar-scroll-indicator {
        @apply w-full;
    }

    .dropdown-toggle[aria-expanded="true"] .dropdown-arrow {
        @apply rotate-180;
    }

    .mobile-menu-toggle.active .hamburger-line-1 {
        @apply rotate-45 translate-y-1.5;
    }

    .mobile-menu-toggle.active .hamburger-line-2 {
        @apply opacity-0;
    }

    .mobile-menu-toggle.active .hamburger-line-3 {
        @apply -rotate-45 -translate-y-1.5;
    }

    .ripple {
        @apply absolute rounded-full bg-blue-500/30 pointer-events-none;
        transform: scale(0);
        animation: ripple 0.6s linear;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar-enhanced');
    const scrollIndicator = document.querySelector('.navbar-scroll-indicator');
    
    // Scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Add ripple effect to nav links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);

            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = e.clientX - rect.left - size / 2 + 'px';
            ripple.style.top = e.clientY - rect.top - size / 2 + 'px';

            setTimeout(() => ripple.remove(), 600);
        });
    });
});

// Dropdown functionality
function toggleDropdown() {
    const dropdown = document.querySelector('.dropdown-menu');
    const toggle = document.querySelector('.dropdown-toggle');
    
    dropdown.classList.toggle('show');
    toggle.setAttribute('aria-expanded', dropdown.classList.contains('show'));
    
    // Close dropdown when clicking outside
    if (dropdown.classList.contains('show')) {
        setTimeout(() => {
            document.addEventListener('click', function closeDropdown(e) {
                if (!e.target.closest('.dropdown-container')) {
                    dropdown.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        }, 10);
    }
}

// Mobile menu functionality
function toggleMobileMenu() {
    const mobileMenu = document.querySelector('.mobile-menu');
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    
    mobileMenu.classList.toggle('show');
    toggleBtn.classList.toggle('active');
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const mobileMenu = document.querySelector('.mobile-menu');
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    
    if (!e.target.closest('.mobile-menu') && !e.target.closest('.mobile-menu-toggle')) {
        mobileMenu.classList.remove('show');
        toggleBtn.classList.remove('active');
    }
});
</script>
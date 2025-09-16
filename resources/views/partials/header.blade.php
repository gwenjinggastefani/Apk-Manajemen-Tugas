<style>
    .navbar-enhanced {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.03);
        padding: 16px 0;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        z-index: 1000;
    }

    .navbar-enhanced::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.01) 0%, rgba(30, 41, 59, 0.01) 100%);
        pointer-events: none;
    }

    .navbar-enhanced.scrolled {
        background: rgba(255, 255, 255, 0.98) !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        padding: 12px 0;
    }

    .navbar-brand {
        font-weight: 800 !important;
        font-size: 24px !important;
        color: #0f172a !important;
        text-decoration: none !important;
        position: relative;
        transition: all 0.3s ease;
        letter-spacing: -0.025em;
    }

    .navbar-brand::after {
        content: '';
        position: absolute;
        width: 0;
        height: 3px;
        bottom: -4px;
        left: 0;
        background: linear-gradient(90deg, #3b82f6, #1d4ed8);
        transition: width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-radius: 2px;
    }

    .navbar-brand:hover {
        color: #1e293b !important;
        transform: translateY(-1px);
    }

    .navbar-brand:hover::after {
        width: 100%;
    }

    .navbar-nav {
        align-items: center;
    }

    .nav-link {
        color: #64748b !important;
        font-weight: 600 !important;
        font-size: 15px !important;
        padding: 12px 20px !important;
        margin: 0 4px !important;
        border-radius: 10px !important;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        position: relative;
        text-decoration: none !important;
        letter-spacing: 0.025em;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), rgba(30, 41, 59, 0.05));
        border-radius: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .nav-link:hover {
        color: #1e293b !important;
        background: rgba(59, 130, 246, 0.05) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
    }

    .nav-link:hover::before {
        opacity: 1;
    }

    .nav-link.active {
        color: #3b82f6 !important;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.05)) !important;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
        position: relative;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 2px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        background: #3b82f6;
        border-radius: 50%;
    }

    .dropdown-toggle {
        position: relative;
        padding-right: 24px !important;
    }

    .dropdown-toggle::after {
        content: '';
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid currentColor;
        transition: transform 0.3s ease;
        border: none;
    }

    .dropdown-toggle::after {
        content: '▼';
        font-size: 10px;
        color: currentColor;
        border: none;
        width: auto;
        height: auto;
    }

    .dropdown-toggle[aria-expanded="true"]::after {
        transform: translateY(-50%) rotate(180deg);
    }

    .dropdown-menu {
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: blur(20px) !important;
        border: 1px solid rgba(0, 0, 0, 0.05) !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1) !important;
        padding: 8px !important;
        margin-top: 8px !important;
        min-width: 160px;
        animation: dropdownSlide 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

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

    .dropdown-item {
        color: #64748b !important;
        font-weight: 600 !important;
        padding: 12px 16px !important;
        border-radius: 8px !important;
        transition: all 0.2s ease !important;
        font-size: 14px !important;
        border: none !important;
        background: none !important;
        width: 100% !important;
        text-align: left !important;
        cursor: pointer;
    }

    .dropdown-item:hover {
        color: #1e293b !important;
        background: rgba(59, 130, 246, 0.08) !important;
        transform: translateX(4px);
    }

    .navbar-toggler {
        border: 2px solid rgba(100, 116, 139, 0.2) !important;
        border-radius: 8px !important;
        padding: 8px 12px !important;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        border-color: rgba(59, 130, 246, 0.3) !important;
        background: rgba(59, 130, 246, 0.05) !important;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2864, 116, 139, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2859, 130, 246, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    }

    /* User avatar placeholder */
    .user-avatar {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 12px;
        margin-right: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Mobile responsiveness */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 12px;
            margin-top: 16px;
            padding: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            animation: mobileMenuSlide 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        @keyframes mobileMenuSlide {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-link {
            margin: 4px 0 !important;
            padding: 16px 20px !important;
        }

        .dropdown-menu {
            background: rgba(248, 250, 252, 0.98) !important;
            margin-top: 8px !important;
            margin-left: 20px !important;
        }
    }

    /* Scroll indicator */
    .navbar-enhanced::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #3b82f6, #06ffa5);
        transition: width 0.3s ease;
        box-shadow: 0 0 10px rgba(6, 255, 165, 0.5);
    }

    .navbar-enhanced.scrolled::after {
        width: 100%;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-enhanced">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Project Manager
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                        Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tasks*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                        Tasks
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('teams*') ? 'active' : '' }}" href="{{ route('teams.index') }}">
                        Teams
                    </a>
                </li>

                {{-- Authentication Section --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="user-avatar">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </span>
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar-enhanced');
    
    // Scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth dropdown animation
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function() {
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu) {
                // Add stagger animation to dropdown items
                const items = dropdownMenu.querySelectorAll('.dropdown-item');
                items.forEach((item, index) => {
                    item.style.animationDelay = `${index * 0.05}s`;
                    item.style.animation = 'fadeInUp 0.3s ease forwards';
                });
            }
        });
    }

    // Active link indicator animation
    const activeLink = document.querySelector('.nav-link.active');
    if (activeLink) {
        activeLink.style.animation = 'pulseActive 2s ease-in-out infinite';
    }

    // Mobile menu enhancement
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            setTimeout(() => {
                if (navbarCollapse.classList.contains('show')) {
                    const navItems = navbarCollapse.querySelectorAll('.nav-item');
                    navItems.forEach((item, index) => {
                        item.style.animationDelay = `${index * 0.1}s`;
                        item.style.animation = 'slideInRight 0.4s ease forwards';
                    });
                }
            }, 10);
        });
    }

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

// Add additional animations
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
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

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.3);
        transform: scale(0);
        animation: rippleAnimation 0.6s linear;
        pointer-events: none;
    }

    @keyframes rippleAnimation {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
`;
document.head.appendChild(additionalStyles);
</script>
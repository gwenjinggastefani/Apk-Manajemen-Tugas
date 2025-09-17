<style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --border-radius: 16px;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .form-container {
            width: 100%;
            max-width: 650px;
            animation: fadeIn 0.6s ease-out;
        }
        
        .form-card {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
        }
        
        .form-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }
        
        .form-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            margin-bottom: 1.2rem;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 2;
        }
        
        .form-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
            letter-spacing: -0.5px;
        }
        
        .form-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 400;
            position: relative;
            z-index: 2;
        }
        
        .form-body {
            padding: 3rem 2.5rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.8rem;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 12px;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }
        
        .form-control, .form-select {
            width: 100%;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 12px;
            transition: var(--transition);
            outline: none;
            background-color: #fff;
            color: var(--dark);
            font-family: 'Inter', sans-serif;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
            transform: translateY(-2px);
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 130px;
            line-height: 1.5;
        }
        
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 18px;
        }
        
        .btn-group {
            display: flex;
            gap: 1.2rem;
            margin-top: 3rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1.1rem 2rem;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            flex: 1;
            font-family: 'Inter', sans-serif;
        }
        
        .btn i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.4);
        }
        
        .btn-secondary {
            background: #fff;
            color: var(--gray);
            border: 2px solid var(--gray-light);
        }
        
        .btn-secondary:hover {
            background: var(--gray-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .invalid-feedback {
            color: var(--danger);
            font-size: 0.9rem;
            margin-top: 0.6rem;
            display: flex;
            align-items: center;
            font-weight: 500;
            background: rgba(239, 68, 68, 0.05);
            padding: 0.6rem 1rem;
            border-radius: 8px;
            border-left: 3px solid var(--danger);
        }
        
        .invalid-feedback i {
            margin-right: 8px;
            font-size: 1rem;
        }
        
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.9rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 0.8rem;
        }
        
        .status-in-progress {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .status-done {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .form-body {
                padding: 2rem 1.5rem;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .form-header {
                padding: 2rem 1.5rem;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
            
            .form-icon {
                width: 70px;
                height: 70px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .form-body {
                padding: 1.5rem 1.2rem;
            }
            
            .form-header {
                padding: 1.8rem 1.2rem;
            }
            
            .btn {
                padding: 1rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-icon">
                    <i class="fas fa-project-diagram fa-2x"></i>
                </div>
                <h1 class="form-title">Buat Project Baru</h1>
                <p class="form-subtitle">Mulai project baru untuk tim Anda</p>
            </div>
            
            <div class="form-body">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-signature"></i>Nama Project
                        </label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Masukkan nama project"
                               required>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i>Deskripsi Project
                        </label>
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Jelaskan detail project yang akan dibuat">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label">
                            <i class="fas fa-tasks"></i>Status Project
                        </label>
                        <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror" 
                                required>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>
                                In Progress <span class="status-badge status-in-progress">Aktif</span>
                            </option>
                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>
                                Done <span class="status-badge status-done">Selesai</span>
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_id" class="form-label">
                            <i class="fas fa-user-tie"></i>Manager Project
                        </label>
                        <select name="user_id" id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Manager --</option>
                            @foreach($users->where('role', 'manager') as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} (Manager)
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>Buat Project
                        </button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Menambahkan efek interaktif pada form
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('.form-control, .form-select');
            
            formControls.forEach(control => {
                // Efek saat fokus
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                // Efek saat kehilangan fokus
                control.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
            
            // Animasi untuk form card
            const formCard = document.querySelector('.form-card');
            formCard.style.opacity = 0;
            formCard.style.transform = 'translateY(20px)';
            
            let opacity = 0;
            const fadeIn = setInterval(() => {
                opacity += 0.05;
                formCard.style.opacity = opacity;
                formCard.style.transform = `translateY(${20 - (20 * opacity)}px)`;
                
                if (opacity >= 1) clearInterval(fadeIn);
            }, 30);
        });
    </script>

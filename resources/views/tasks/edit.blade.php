<style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --border-radius: 12px;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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
        }
        
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 40px);
        }
        
        .form-card {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 700px;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .form-header {
            background: linear-gradient(120deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
        }
        
        .form-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        
        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .form-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 400;
        }
        
        .form-body {
            padding: 2.5rem 2rem;
        }
        
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.75rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .form-control, .form-select {
            width: 100%;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 10px;
            transition: var(--transition);
            outline: none;
            background-color: #fff;
            color: var(--dark);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .form-control:disabled {
            background-color: #f9fafb;
            color: var(--gray);
        }
        
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
        }
        
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 1.75rem;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            flex: 1;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(120deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-secondary {
            background: #fff;
            color: var(--gray);
            border: 2px solid var(--gray-light);
        }
        
        .btn-secondary:hover {
            background: var(--gray-light);
            transform: translateY(-2px);
        }
        
        .invalid-feedback {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .invalid-feedback i {
            margin-right: 5px;
        }
        
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: #ef4444;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-left: 0.75rem;
        }
        
        .status-not-started {
            background-color: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }
        
        .status-in-progress {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }
        
        .status-completed {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        .info-box {
            background-color: #f0f9ff;
            border-left: 4px solid var(--info);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .info-box i {
            color: var(--info);
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        @media (max-width: 768px) {
            .form-body {
                padding: 1.5rem;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .form-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <div class="form-icon">
                    <i class="fas fa-edit fa-2x"></i>
                </div>
                <h1 class="form-title">Edit Task</h1>
                <p class="form-subtitle">Perbarui informasi task Anda</p>
            </div>
            
            <div class="form-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading"></i>Judul Task
                        </label>
                        <input type="text" name="title" id="title"
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $task->title) }}" 
                               placeholder="Masukkan judul task"
                               required>
                        @error('title')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label">
                            <i class="fas fa-tasks"></i>Status
                        </label>
                        <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror" 
                                required>
                            <option value="belum_dikerjakan" {{ old('status', $task->status) == 'belum_dikerjakan' ? 'selected' : '' }}>
                                Belum Dikerjakan <span class="status-badge status-not-started">Not Started</span>
                            </option>
                            <option value="sedang_dikerjakan" {{ old('status', $task->status) == 'sedang_dikerjakan' ? 'selected' : '' }}>
                                Sedang Dikerjakan <span class="status-badge status-in-progress">In Progress</span>
                            </option>
                            <option value="selesai" {{ old('status', $task->status) == 'selesai' ? 'selected' : '' }}>
                                Selesai <span class="status-badge status-completed">Completed</span>
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="info-box">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <strong>Pemilik Project:</strong> {{ $task->project->user->name ?? '-' }}
                            <br>
                            <small>Pemilik project tidak dapat diubah melalui form ini</small>
                        </div>
                    </div>
                    
                    <input type="hidden" name="user_id" value="{{ $task->project->user_id }}">

                    <div class="form-group">
                        <label for="project_id" class="form-label">
                            <i class="fas fa-project-diagram"></i>Project
                        </label>
                        <select name="project_id" id="project_id"
                                class="form-select @error('project_id') is-invalid @enderror" 
                                required>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sync-alt"></i>Update Task
                        </button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
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
                
                // Set nilai awal jika sudah terisi
                if (control.value) {
                    control.parentElement.classList.add('focused');
                }
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
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
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            margin-right: 12px;
            color: var(--primary);
        }
        
        .card {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 2rem;
            transition: var(--transition);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: linear-gradient(120deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1.5rem 2rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .task-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        .task-description {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
            padding: 1.2rem;
            background: #f9fafb;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--gray);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        .detail-label i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        .detail-value {
            font-size: 1.1rem;
            color: var(--dark);
            font-weight: 500;
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .badge-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .badge-secondary {
            background-color: rgba(100, 116, 139, 0.1);
            color: var(--gray);
        }
        
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .btn i {
            margin-right: 8px;
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
        
        .btn-warning {
            background: linear-gradient(120deg, var(--warning) 0%, #fbbf24 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.25);
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(120deg, var(--danger) 0%, #f87171 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.25);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(239, 68, 68, 0.3);
        }
        
        .action-group {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .timestamp {
            display: flex;
            gap: 2rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-light);
        }
        
        .timestamp-item {
            display: flex;
            flex-direction: column;
        }
        
        .timestamp-label {
            font-size: 0.875rem;
            color: var(--gray);
            margin-bottom: 0.25rem;
        }
        
        .timestamp-value {
            font-weight: 600;
            color: var(--dark);
        }
        
        @media (max-width: 768px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-group, .action-group {
                flex-direction: column;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .timestamp {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-tasks"></i>Detail Task
            </h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="task-title">{{ $task->title }}</h2>
                <p class="task-description">{{ $task->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
            
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-tasks"></i>Status
                        </span>
                        <span class="detail-value">
                            <span class="badge 
                                @if($task->status === 'selesai') badge-success 
                                @elseif($task->status === 'sedang_dikerjakan') badge-warning 
                                @else badge-secondary @endif">
                                <i class="fas 
                                    @if($task->status === 'selesai') fa-check-circle 
                                    @elseif($task->status === 'sedang_dikerjakan') fa-spinner 
                                    @else fa-clock @endif me-2"></i>
                                {{ ucfirst(str_replace('_',' ',$task->status)) }}
                            </span>
                        </span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-calendar-day"></i>Deadline
                        </span>
                        <span class="detail-value">
                            {{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') : '-' }}
                        </span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-project-diagram"></i>Project
                        </span>
                        <span class="detail-value">{{ $task->project->name ?? '-' }}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-user"></i>User
                        </span>
                        <span class="detail-value">{{ $task->user->name ?? '-' }}</span>
                    </div>
                </div>
                
                <div class="timestamp">
                    <div class="timestamp-item">
                        <span class="timestamp-label">Dibuat Pada</span>
                        <span class="timestamp-value">
                            <i class="fas fa-calendar-plus"></i> {{ $task->created_at->format('d-m-Y H:i') }}
                        </span>
                    </div>
                    
                    <div class="timestamp-item">
                        <span class="timestamp-label">Terakhir Diperbarui</span>
                        <span class="timestamp-value">
                            <i class="fas fa-calendar-check"></i> {{ $task->updated_at->format('d-m-Y H:i') }}
                        </span>
                    </div>
                </div>
                
                <div class="btn-group">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Kembali
                    </a>

                    {{-- 🔒 Edit & hapus hanya manager --}}
                    @can('isManager')
                        <div class="action-group">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus task ini?')" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>Hapus
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menambahkan efek interaktif pada card
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.card');
            card.style.opacity = 0;
            card.style.transform = 'translateY(20px)';
            
            let opacity = 0;
            const fadeIn = setInterval(() => {
                opacity += 0.05;
                card.style.opacity = opacity;
                card.style.transform = `translateY(${20 - (20 * opacity)}px)`;
                
                if (opacity >= 1) clearInterval(fadeIn);
            }, 50);
            
            // Konfirmasi penghapusan task
            const deleteForm = document.querySelector('form');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(e) {
                    if (!confirm('Yakin hapus task ini?')) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
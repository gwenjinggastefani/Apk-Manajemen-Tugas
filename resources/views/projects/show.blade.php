<style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --danger: #ef4444;
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
            max-width: 1200px;
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
            padding: 1.5rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .project-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        .project-description {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
        }
        
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--gray);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .detail-label i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        .detail-value {
            font-size: 1.1rem;
            color: var(--dark);
        }
        
        .badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.875rem;
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
        
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
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
        
        .btn-primary {
            background: linear-gradient(120deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(120deg, var(--info) 0%, #60a5fa 100%);
            color: white;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
        }
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.3);
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
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            color: var(--dark);
        }
        
        .section-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .table-container {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .table-header {
            background: var(--gray-light);
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .task-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .task-table th {
            background: var(--light);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--gray);
            border-bottom: 1px solid var(--gray-light);
        }
        
        .task-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .task-table tr:last-child td {
            border-bottom: none;
        }
        
        .task-table tr:hover {
            background: #f9fafb;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--gray);
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-light);
        }
        
        .action-group {
            display: flex;
            gap: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .action-group {
                flex-direction: column;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .task-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-project-diagram"></i>Detail Project
            </h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="project-title">{{ $project->name }}</h2>
                <p class="project-description">{{ $project->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
            
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-tasks"></i>Status
                        </span>
                        <span class="detail-value">
                            <span class="badge {{ $project->status === 'done' ? 'badge-success' : 'badge-warning' }}">
                                {{ ucfirst(str_replace('_',' ',$project->status)) }}
                            </span>
                        </span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-user"></i>Pemilik Project
                        </span>
                        <span class="detail-value">{{ $project->user->name ?? '-' }}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="fas fa-calendar"></i>Dibuat pada
                        </span>
                        <span class="detail-value">{{ $project->created_at->format('d-m-Y H:i') }}</span>
                    </div>
                </div>
                
                <div class="btn-group">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Kembali
                    </a>

                    {{-- 🔒 Manager bisa edit project --}}
                    @can('isManager')
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>Edit Project
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <h2 class="section-title">
            <i class="fas fa-list-check"></i>Daftar Task
        </h2>

        <div class="table-container">
            <div class="table-header">
                Task dalam project ini
            </div>
            
            @if($project->tasks->count() > 0)
                <table class="task-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Task</th>
                            <th>Status</th>
                            <th>Ditugaskan ke</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project->tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $task->title }}</strong>
                                </td>
                                <td>
                                    <span class="badge {{ $task->status === 'done' ? 'badge-success' : 'badge-warning' }}">
                                        {{ ucfirst(str_replace('_',' ',$task->status)) }}
                                    </span>
                                </td>
                                <td>{{ $task->user->name ?? '-' }}</td>
                                <td>
                                    <div class="action-group">
                                        {{-- User hanya bisa lihat --}}
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>Detail
                                        </a>

                                        {{-- 🔒 Manager bisa edit & hapus --}}
                                        @can('isManager')
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin hapus task ini?')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>Hapus
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-tasks"></i>
                    <p>Belum ada task dalam project ini</p>
                </div>
            @endif
        </div>

        {{-- 🔒 Manager bisa tambah task baru --}}
        @can('isManager')
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>Tambah Task
            </a>
        @endcan
    </div>

    <script>
        // Menambahkan efek interaktif pada card dan tabel
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card, .table-container');
            
            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                
                let opacity = 0;
                const fadeIn = setInterval(() => {
                    opacity += 0.05;
                    card.style.opacity = opacity;
                    card.style.transform = `translateY(${20 - (20 * opacity)}px)`;
                    
                    if (opacity >= 1) clearInterval(fadeIn);
                }, 50);
            });
            
            // Konfirmasi penghapusan task
            const deleteForms = document.querySelectorAll('form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Yakin hapus task ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
{{-- resources/views/tasks/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4361ee',
                        'primary-light': '#4895ef',
                        secondary: '#3f37c9',
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#3b82f6',
                    }
                }
            }
        }
    </script>
</head>
<body>
<div class="font-sans bg-gradient-to-br from-slate-50 to-slate-200 text-slate-800 min-h-screen p-5">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 flex items-center mb-4 md:mb-0">
                <i class="fas fa-tasks text-primary mr-3"></i>
                Detail Task
            </h1>
        </div>

        <!-- Main Card -->
  <!-- Card Header -->
            <div class="relative bg-gradient-to-r from-primary to-secondary text-white p-8 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-radial from-white/10 via-transparent to-transparent"></div>
                <div class="relative z-10">
                    <h2 class="text-2xl md:text-3xl font-bold mb-3">{{ $task->title }}</h2>
                    <p class="text-lg opacity-90 leading-relaxed">{{ $task->description ?? 'Tidak ada deskripsi' }}</p>
                </div>
            </div>
            
            <div class="p-8">
                <!-- Status Update untuk User -->
                @if(auth()->user()->role === 'user' && $task->user_id === auth()->id())
                    <div class="bg-slate-50 p-6 rounded-xl mb-8 border border-slate-200">
                        <h4 class="flex items-center text-slate-800 font-bold text-lg mb-4">
                            <i class="fas fa-cog text-primary mr-3"></i>
                            Kelola Status Task
                        </h4>
                        
                        @if($task->status === 'belum_dikerjakan')
                            <div class="bg-blue-50 border-l-4 border-info p-4 rounded-r-lg mb-4 flex items-center">
                                <i class="fas fa-info-circle text-info mr-3"></i>
                                <span class="text-slate-700">Task ini belum dikerjakan. Klik "Mulai Kerjakan" untuk memulai.</span>
                            </div>
                        @endif
                        
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" id="statusForm">
                            @csrf
                            @method('PATCH')
                            
                            <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                                <select name="status" class="flex-1 px-4 py-3 border-2 border-slate-200 rounded-lg text-slate-800 bg-white focus:border-primary focus:ring-3 focus:ring-primary/10 transition-all duration-300" id="statusSelect">
                                    <option value="belum_dikerjakan" {{ $task->status === 'belum_dikerjakan' ? 'selected' : '' }}>
                                        Belum Dikerjakan
                                    </option>
                                    <option value="sedang_dikerjakan" {{ $task->status === 'sedang_dikerjakan' ? 'selected' : '' }}>
                                        Sedang Dikerjakan
                                    </option>
                                    <option value="selesai" {{ $task->status === 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>
                                
                                <div class="flex gap-3">
                                    <!-- Tombol khusus untuk mulai mengerjakan -->
                                    @if($task->status === 'belum_dikerjakan')
                                        <button type="button" class="px-6 py-3 bg-gradient-to-r from-primary to-primary-light text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5" onclick="startWorking()">
                                            <i class="fas fa-play mr-2"></i>Mulai Kerjakan
                                        </button>
                                    @endif
                                    
                                    <!-- Tombol khusus untuk menyelesaikan -->
                                    @if($task->status === 'sedang_dikerjakan')
                                        <button type="button" class="px-6 py-3 bg-gradient-to-r from-success to-green-400 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5" onclick="completeTask()">
                                            <i class="fas fa-check mr-2"></i>Selesaikan Task
                                        </button>
                                    @endif
                                    
                                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary to-primary-light text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5" id="updateBtn">
                                        <i class="fas fa-save mr-2"></i>Update Status
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                
                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex flex-col p-5 bg-slate-50 rounded-xl border-l-4 border-primary">
                        <span class="flex items-center text-slate-600 font-semibold mb-2">
                            <i class="fas fa-tasks text-primary mr-2"></i>Status
                        </span>
                        <span class="text-slate-800 text-lg font-medium">
                            @if($task->status === 'selesai')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Selesai
                                </span>
                            @elseif($task->status === 'sedang_dikerjakan')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-spinner mr-2"></i>
                                    Sedang Dikerjakan
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-slate-100 text-slate-700">
                                    <i class="fas fa-clock mr-2"></i>
                                    Belum Dikerjakan
                                </span>
                            @endif
                        </span>
                    </div>
                    
                    <div class="flex flex-col p-5 bg-slate-50 rounded-xl border-l-4 border-primary">
                        <span class="flex items-center text-slate-600 font-semibold mb-2">
                            <i class="fas fa-calendar-day text-primary mr-2"></i>Deadline
                        </span>
                        <span class="text-slate-800 text-lg font-medium">
                            {{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') : '-' }}
                        </span>
                    </div>
                    
                    <div class="flex flex-col p-5 bg-slate-50 rounded-xl border-l-4 border-primary">
                        <span class="flex items-center text-slate-600 font-semibold mb-2">
                            <i class="fas fa-project-diagram text-primary mr-2"></i>Project
                        </span>
                        <span class="text-slate-800 text-lg font-medium">{{ $task->project->name ?? '-' }}</span>
                    </div>
                    
                    <div class="flex flex-col p-5 bg-slate-50 rounded-xl border-l-4 border-primary">
                        <span class="flex items-center text-slate-600 font-semibold mb-2">
                            <i class="fas fa-user text-primary mr-2"></i>User
                        </span>
                        <span class="text-slate-800 text-lg font-medium">{{ $task->user->name ?? '-' }}</span>
                    </div>
                </div>
                
                <!-- Timestamp -->
                <div class="flex flex-col md:flex-row gap-8 pt-6 border-t border-slate-200 mb-8">
                    <div class="flex flex-col">
                        <span class="text-sm text-slate-500 mb-1">Dibuat Pada</span>
                        <span class="font-semibold text-slate-800">
                            <i class="fas fa-calendar-plus text-primary mr-2"></i>
                            {{ $task->created_at->format('d-m-Y H:i') }}
                        </span>
                    </div>
                    
                    <div class="flex flex-col">
                        <span class="text-sm text-slate-500 mb-1">Terakhir Diperbarui</span>
                        <span class="font-semibold text-slate-800">
                            <i class="fas fa-calendar-check text-primary mr-2"></i>
                            {{ $task->updated_at->format('d-m-Y H:i') }}
                        </span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="{{ route('tasks.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-slate-600 font-semibold rounded-lg border-2 border-slate-200 transition-all duration-300 hover:bg-slate-100 hover:-translate-y-0.5 hover:shadow-lg">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>

                    <!-- Edit & hapus hanya manager -->
                    @if(auth()->user()->role === 'manager')
                        <div class="flex flex-col md:flex-row gap-3 md:ml-auto">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-warning to-yellow-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus task ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-danger to-red-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                                    <i class="fas fa-trash mr-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
        
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
        }
    </style>

    <script>
        // Card animation
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.bg-white');
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
        
        // Start working function
        function startWorking() {
            if (confirm('Mulai mengerjakan task ini?')) {
                document.getElementById('statusSelect').value = 'sedang_dikerjakan';
                document.getElementById('statusForm').submit();
            }
        }
        
        // Complete task function
        function completeTask() {
            if (confirm('Yakin task ini sudah selesai?')) {
                document.getElementById('statusSelect').value = 'selesai';
                document.getElementById('statusForm').submit();
            }
        }
        
        // Status change indicator
        document.getElementById('statusSelect').addEventListener('change', function() {
            const updateBtn = document.getElementById('updateBtn');
            updateBtn.className = 'px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5';
            updateBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Klik untuk Simpan';
        });
    </script>
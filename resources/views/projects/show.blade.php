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
<div class="bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-6xl">
        <br>
        <br>
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-project-diagram mr-3 text-blue-600"></i>
                Detail Project
            </h1>
        </div>

        <!-- Project Detail Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 transform hover:-translate-y-1 transition-all duration-300">
            <!-- Project Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-8">
                <h2 class="text-3xl font-bold mb-2">{{ $project->name }}</h2>
                <p class="text-lg opacity-90">{{ $project->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
            
            <!-- Project Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Status -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-tasks text-blue-600 mr-3"></i>
                            <span class="text-sm font-medium text-gray-600">Status</span>
                        </div>
                        <div class="text-lg font-semibold">
                            <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium
                                {{ $project->status === 'done' 
                                    ? 'bg-green-100 text-green-800' 
                                    : 'bg-yellow-100 text-yellow-800' }}">
                                <i class="fas {{ $project->status === 'done' ? 'fa-check-circle' : 'fa-clock' }} mr-2"></i>
                                {{ ucfirst(str_replace('_',' ',$project->status)) }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Owner -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-user text-blue-600 mr-3"></i>
                            <span class="text-sm font-medium text-gray-600">Pemilik Project</span>
                        </div>
                        <div class="flex items-center">
                            <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-blue-600 text-sm"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">{{ $project->user->name ?? '-' }}</span>
                        </div>
                    </div>
                    
                    <!-- Created Date -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-calendar text-blue-600 mr-3"></i>
                            <span class="text-sm font-medium text-gray-600">Dibuat pada</span>
                        </div>
                        <div class="text-lg font-semibold text-gray-800">
                            {{ $project->created_at->format('d-m-Y H:i') }}
                        </div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('projects.index') }}" 
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold transition-all duration-200 hover:-translate-y-1 transform inline-flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>

                    {{-- Manager bisa edit project --}}
                    @can('isManager')
                        <a href="{{ route('projects.edit', $project->id) }}" 
                           class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 hover:-translate-y-1 transform inline-flex items-center">
                            <i class="fas fa-edit mr-2"></i>Edit Project
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Tasks Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Section Header -->
            <div class="bg-gradient-to-r from-indigo-100 to-purple-100 px-8 py-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-list-check mr-3 text-indigo-600"></i>
                    Daftar Task
                </h2>
                <p class="text-gray-600 mt-1">Task dalam project ini</p>
            </div>
            
            @if($project->tasks->count() > 0)
                <!-- Tasks Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Judul Task</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Ditugaskan ke</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($project->tasks as $task)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $task->title }}</div>
                                        @if($task->description)
                                            <div class="text-sm text-gray-500 max-w-xs truncate">{{ $task->description }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            {{ $task->status === 'done' 
                                                ? 'bg-green-100 text-green-800' 
                                                : 'bg-yellow-100 text-yellow-800' }}">
                                            <i class="fas {{ $task->status === 'done' ? 'fa-check-circle' : 'fa-clock' }} mr-1 text-xs"></i>
                                            {{ ucfirst(str_replace('_',' ',$task->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-purple-600 text-xs"></i>
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $task->user->name ?? '-' }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            {{-- User hanya bisa lihat --}}
                                            <a href="{{ route('tasks.show', $task->id) }}" 
                                               class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                                <i class="fas fa-eye mr-1"></i>Detail
                                            </a>

                                            {{-- Manager bisa edit & hapus --}}
                                            @can('isManager')
                                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                                   class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                                    <i class="fas fa-edit mr-1"></i>Edit
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Yakin hapus task ini?')" 
                                                            class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                                        <i class="fas fa-trash mr-1"></i>Hapus
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Empty State -->
                <div class="px-8 py-12 text-center">
                    <div class="flex flex-col items-center justify-center text-gray-500">
                        <i class="fas fa-tasks text-6xl mb-4 text-gray-300"></i>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">Belum ada task</h3>
                        <p class="text-sm text-gray-500 mb-6">Belum ada task dalam project ini</p>
                        
                        @can('isManager')
                            <a href="{{ route('tasks.create') }}" 
                               class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 hover:-translate-y-1 transform inline-flex items-center">
                                <i class="fas fa-plus mr-2"></i>Tambah Task Pertama
                            </a>
                        @endcan
                    </div>
                </div>
            @endif
        </div>

        {{-- Manager bisa tambah task baru --}}
        @if($project->tasks->count() > 0)
            @can('isManager')
                <div class="mt-8 text-center">
                    <a href="{{ route('tasks.create') }}" 
                       class="bg-gradient-to-r from-green-600 to-teal-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-teal-700 transition-all duration-200 hover:-translate-y-1 transform inline-flex items-center text-lg shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Tambah Task Baru
                    </a>
                </div>
            @endcan
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add staggered fade-in animation to cards
    const cards = document.querySelectorAll('.bg-white');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
    
    // Add fade-in animation to table rows
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-20px)';
        
        setTimeout(() => {
            row.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, 800 + (index * 100));
    });
    
    // Confirm delete action
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Yakin hapus task ini? Data yang terhapus tidak dapat dikembalikan.')) {
                this.closest('form').submit();
            }
        });
    });
});
</script>

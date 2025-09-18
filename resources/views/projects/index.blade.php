@extends('layouts.app')

@section('title', 'Daftar Project - Project Manager')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 min-h-screen">
<br>
<br>    
<!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-project-diagram mr-3 text-blue-600"></i>
            Daftar Project
        </h1>
        
        {{-- Tombol tambah hanya muncul kalau manager --}}
        @can('isManager')
            <a href="{{ route('projects.create') }}" 
               class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 hover:shadow-lg hover:-translate-y-1 transform inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Project
            </a>
        @endcan
    </div>

    <!-- Projects Table Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama Project</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Dibuat Pada</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $project->name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 max-w-xs truncate">
                                    {{ $project->description ?: 'Tidak ada deskripsi' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $project->status === 'done' 
                                        ? 'bg-green-100 text-green-800' 
                                        : 'bg-yellow-100 text-yellow-800' }}">
                                    <i class="fas {{ $project->status === 'done' ? 'fa-check-circle' : 'fa-clock' }} mr-1 text-xs"></i>
                                    {{ ucfirst(str_replace('_',' ',$project->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <i class="fas fa-user text-blue-600 text-xs"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $project->user->name ?? '-' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ $project->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    {{-- Semua role bisa lihat detail --}}
                                    <a href="{{ route('projects.show', $project->id) }}" 
                                       class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    
                                    {{-- Edit & hapus hanya manager --}}
                                    @can('isManager')
                                        <a href="{{ route('projects.edit', $project->id) }}" 
                                           class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin hapus project ini?')" 
                                                    class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-lg transition-colors duration-200 inline-flex items-center text-xs">
                                                <i class="fas fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <i class="fas fa-folder-open text-4xl mb-4 text-gray-300"></i>
                                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada project</h3>
                                    <p class="text-sm">Mulai dengan membuat project baru</p>
                                    @can('isManager')
                                        <a href="{{ route('projects.create') }}" 
                                           class="mt-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 inline-flex items-center text-sm">
                                            <i class="fas fa-plus mr-2"></i> Buat Project
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add fade-in animation to table rows
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Confirm delete action
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Yakin hapus project ini? Data yang terhapus tidak dapat dikembalikan.')) {
                this.closest('form').submit();
            }
        });
    });
});
</script>
@endsection
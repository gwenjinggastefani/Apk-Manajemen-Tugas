{{-- resources/views/tasks/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <br>
    <br>
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <h1 class="text-3xl font-bold text-slate-800 flex items-center mb-4 md:mb-0">
            <i class="fas fa-tasks text-blue-600 mr-3"></i>
            Daftar Task
        </h1>
        
        {{-- 🔒 Tombol tambah hanya muncul kalau manager --}}
        @can('isManager')
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg shadow-lg hover:from-blue-700 hover:to-blue-800 hover:-translate-y-0.5 transition-all duration-300">
                <i class="fas fa-plus mr-2"></i>
                Tambah Task
            </a>
        @endcan
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">Project</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">User</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">Dibuat Pada</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($tasks as $task)
                        <tr class="hover:bg-slate-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-900 font-medium">
                                {{ $task->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($task->status === 'selesai')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Selesai
                                    </span>
                                @elseif($task->status === 'sedang_dikerjakan')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-spinner mr-1"></i>
                                        Sedang Dikerjakan
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                        <i class="fas fa-clock mr-1"></i>
                                        Belum Dikerjakan
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-900">
                                {{ $task->project->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-900">
                                {{ $task->user->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                {{ $task->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center space-x-2">
                                    {{-- Semua role bisa lihat detail --}}
                                    <a href="{{ route('tasks.show', $task->id) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fas fa-eye mr-1"></i>
                                        Detail
                                    </a>

                                    {{-- 🔒 Edit & hapus hanya manager --}}
                                    @can('isManager')
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-md hover:bg-yellow-200 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin hapus task ini?')" class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded-md hover:bg-red-200 transition-colors duration-200">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-500">
                                    <i class="fas fa-inbox text-4xl mb-4 text-slate-300"></i>
                                    <p class="text-lg font-medium">Belum ada task</p>
                                    <p class="text-sm">Mulai dengan membuat task pertama Anda</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

   
</div>
@endsection
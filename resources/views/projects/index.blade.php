@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Project</h1>
        
        @can('isManager')
            <a href="{{ route('projects.create') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                + Tambah Project
            </a>
        @endcan
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nama Project</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Deskripsi</th>
                    
                    {{-- Kolom tambahan hanya untuk manager --}}
                    @can('isManager')
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Dibuat Pada</th>
                    @endcan

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

                        {{-- Data tambahan hanya untuk manager --}}
                        @can('isManager')
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
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900">
                                        {{ $project->user->name ?? 'Tidak ada' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $project->created_at->format('d M Y') }}
                            </td>
                        @endcan

                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                            <a href="{{ route('projects.show', $project) }}" 
                               class="px-3 py-1 bg-blue-500 text-white text-sm rounded-lg shadow hover:bg-blue-600 transition duration-200">
                                Detail
                            </a>

                            @can('isManager')
                                <a href="{{ route('projects.edit', $project) }}" 
                                   class="px-3 py-1 bg-yellow-500 text-white text-sm rounded-lg shadow hover:bg-yellow-600 transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-500 text-white text-sm rounded-lg shadow hover:bg-red-600 transition duration-200">
                                        Hapus
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="@can('isManager') 7 @else 4 @endcan" 
                            class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada project yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

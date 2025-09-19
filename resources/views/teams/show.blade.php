{{-- resources/views/teams/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Team</title>
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
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-200 p-5 flex justify-center">
    <div class="w-full max-w-4xl">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 flex items-center mb-4 md:mb-0">
                <i class="fas fa-users text-blue-600 mr-3"></i>Detail Team
            </h1>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-bold flex items-center mb-2">
                    <i class="fas fa-user-friends mr-3"></i>Struktur Team
                </h2>
                <p class="opacity-90">Detail informasi tentang tim, project, dan anggotanya</p>
            </div>

            <div class="p-6 md:p-8">
                <!-- Detail Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Manager -->
                    <div class="bg-slate-50 rounded-xl p-4 border-l-4 border-blue-600">
                        <span class="flex items-center text-gray-600 font-semibold mb-1 text-sm">
                            <i class="fas fa-user-tie mr-2 text-blue-600"></i>Manager
                        </span>
                        <span class="text-slate-800 font-medium text-lg">
                            {{ $team->manager->name ?? '-' }}
                        </span>
                    </div>

                    <!-- Member -->
                    <div class="bg-slate-50 rounded-xl p-4 border-l-4 border-green-500">
                        <span class="flex items-center text-gray-600 font-semibold mb-1 text-sm">
                            <i class="fas fa-user mr-2 text-green-500"></i>Anggota Team
                        </span>
                        <span class="text-slate-800 font-medium text-lg">
                            {{ $team->user->name ?? '-' }}
                        </span>
                    </div>

                    <!-- Project -->
                    <div class="bg-slate-50 rounded-xl p-4 border-l-4 border-purple-500 col-span-1 md:col-span-2">
                        <span class="flex items-center text-gray-600 font-semibold mb-1 text-sm">
                            <i class="fas fa-project-diagram mr-2 text-purple-500"></i>Project
                        </span>
                        <span class="text-slate-800 font-medium text-lg">
                            {{ $team->project->name ?? '-' }}
                        </span>
                    </div>
                </div>

                <!-- Timestamp -->
                <div class="flex flex-col md:flex-row gap-6 border-t border-gray-200 pt-4 mb-6">
                    <div>
                        <span class="text-gray-500 text-sm">Dibuat Pada</span>
                        <p class="text-slate-800 font-semibold mt-1">
                            <i class="fas fa-calendar-plus mr-1"></i> {{ $team->created_at->format('d-m-Y H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="{{ route('teams.index') }}" class="flex-1 bg-white border border-gray-300 text-gray-700 px-5 py-3 rounded-lg font-semibold hover:bg-gray-100 text-center transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>

                    @can('isManager')
                        <div class="flex-1 flex gap-2">
                            <a href="{{ route('teams.edit', $team->id) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg font-semibold flex justify-center items-center transition">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>

                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus team ini?')" class="w-full bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-lg font-semibold flex justify-center items-center transition">
                                    <i class="fas fa-trash mr-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

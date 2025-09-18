{{-- resources/views/tasks/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
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

<div class="font-sans bg-gradient-to-br from-slate-50 to-slate-200 text-slate-800 min-h-screen p-5">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-3xl">

            <!-- Header -->
            <div class="relative bg-gradient-to-r from-[#4361ee] to-[#3f37c9] text-white p-10 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                    <i class="fas fa-edit text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-2">Edit Team</h1>
                <p class="text-base opacity-90">Perbarui informasi tim untuk project management</p>
            </div>

            <!-- Form Body -->
            <div class="p-10">
                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                            <h3 class="text-red-800 font-semibold">Terdapat kesalahan:</h3>
                        </div>
                        <ul class="list-disc list-inside text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('teams.update', $team->id) }}" method="POST" class="space-y-7">
                    @csrf
                    @method('PUT')

                    <!-- Manager Selection -->
                    <div class="group">
                        <label for="manager_id" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-user-tie" style="color:#4361ee; margin-right:0.5rem"></i>
                            Manager
                        </label>
                        <select name="manager_id" id="manager_id"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg transition-all duration-300 outline-none bg-white text-slate-800 focus:border-[#4895ef] focus:ring-3 focus:ring-[#4361ee]/15 appearance-none @error('manager_id') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Manager --</option>
                            @foreach ($users as $user)
                                @if ($user->role === 'manager')
                                    <option value="{{ $user->id }}" {{ old('manager_id', $team->manager_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('manager_id')
                            <div class="flex items-center mt-2 text-red-500 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Project Selection -->
                    <div class="group">
                        <label for="project_id" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-project-diagram" style="color:#4361ee; margin-right:0.5rem"></i>
                            Project
                        </label>
                        <select name="project_id" id="project_id"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg transition-all duration-300 outline-none bg-white text-slate-800 focus:border-[#4895ef] focus:ring-3 focus:ring-[#4361ee]/15 appearance-none @error('project_id') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Project --</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $team->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <div class="flex items-center mt-2 text-red-500 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Current Team Info -->
                    <div class="bg-[#3b82f6]/10 border-l-4 border-[#3b82f6] p-4 rounded-lg flex flex-col md:flex-row gap-4 mb-6">
                        <div class="flex-1">
                            <div class="font-semibold text-slate-800 flex items-center">
                                <i class="fas fa-user-tie text-[#3b82f6] mr-2"></i> Manager
                            </div>
                            <div class="text-slate-600">{{ $team->manager->name ?? '-' }}</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-slate-800 flex items-center">
                                <i class="fas fa-user text-[#3b82f6] mr-2"></i> Anggota
                            </div>
                            <div class="text-slate-600">{{ $team->user->name ?? '-' }}</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-slate-800 flex items-center">
                                <i class="fas fa-project-diagram text-[#3b82f6] mr-2"></i> Project
                            </div>
                            <div class="text-slate-600">{{ $team->project->name ?? '-' }}</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-slate-800 flex items-center">
                                <i class="fas fa-calendar-alt text-[#3b82f6] mr-2"></i> Dibuat
                            </div>
                            <div class="text-slate-600">{{ $team->created_at->format('d-m-Y H:i') }}</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-6">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-[#4361ee] to-[#4895ef] shadow-lg shadow-[#4361ee]/25 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-[#4361ee]/30">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('teams.index') }}" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-slate-600 bg-white border-2 border-slate-200 transition-all duration-300 hover:bg-slate-100 hover:-translate-y-0.5">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
        }
    </style>
</div>


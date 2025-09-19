{{-- resources/views/tasks/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Task Baru</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-2xl">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition hover:-translate-y-1 hover:shadow-2xl">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white p-8 text-center relative">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-white/20 backdrop-blur-md rounded-full">
                    <i class="fas fa-tasks text-3xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold mb-1">Buat Task Baru</h1>
                <p class="text-white/90">Tambahkan task untuk project Anda</p>
            </div>

            <!-- Body -->
            <div class="p-8">
                <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Judul -->
                    <div>
                        <label for="title" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-signature mr-2 text-indigo-600"></i> Judul Task
                        </label>
                        <input type="text" name="title" id="title"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 @enderror"
                            value="{{ old('title') }}" placeholder="Masukkan judul task" required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-align-left mr-2 text-indigo-600"></i> Deskripsi Task
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan detail task">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-calendar-alt mr-2 text-indigo-600"></i> Deadline
                        </label>
                        <input type="date" name="deadline" id="deadline"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('deadline') border-red-500 @enderror"
                            value="{{ old('deadline') }}">
                        @error('deadline')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-tasks mr-2 text-indigo-600"></i> Status Task
                        </label>
                        <select name="status" id="status"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('status') border-red-500 @enderror"
                            required>
                            <option value="belum_dikerjakan" {{ old('status') == 'belum_dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                            <option value="sedang_dikerjakan" {{ old('status') == 'sedang_dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Project -->
                    <div>
                        <label for="project_id" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-project-diagram mr-2 text-indigo-600"></i> Pilih Project
                        </label>
                        <select name="project_id" id="project_id"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('project_id') border-red-500 @enderror"
                            required>
                            <option value="">-- Pilih Project --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- User -->
                    <div>
                        <label for="user_id" class="block font-semibold mb-2 text-gray-700">
                            <i class="fas fa-user mr-2 text-indigo-600"></i> Assign ke User
                        </label>
                        <select name="user_id" id="user_id"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('user_id') border-red-500 @enderror"
                            required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit" 
                            class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition flex items-center justify-center">
                            <i class="fas fa-plus-circle mr-2"></i> Simpan Task
                        </button>
                        <a href="{{ route('tasks.index') }}" 
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold shadow-sm transition flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

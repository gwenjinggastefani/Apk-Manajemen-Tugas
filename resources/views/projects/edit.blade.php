{{-- resources/views/tasks/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
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
                    },
                    boxShadow: {
                        'card': '0 10px 30px rgba(0,0,0,0.08)',
                        'card-hover': '0 15px 40px rgba(0,0,0,0.12)',
                    },
                    borderRadius: {
                        '2xl': '1rem'
                    },
                    transitionProperty: {
                        'height': 'height',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-200 min-h-screen flex items-center justify-center p-5 font-sans">

    <div class="bg-white rounded-2xl shadow-card w-full max-w-xl overflow-hidden transform transition duration-500 hover:shadow-card-hover hover:-translate-y-1">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-secondary text-white text-center p-8 relative">
            <div class="flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 animate-pulse">
                <i class="fas fa-edit text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold mb-1">Edit Project</h1>
            <p class="opacity-90">Perbarui informasi project Anda</p>
        </div>

        <!-- Form Body -->
        <div class="p-8">
            <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Project -->
                <div>
                    <label for="name" class="block font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-signature mr-2 text-primary"></i>Nama Project
                    </label>
                    <input type="text" name="name" id="name"
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light transition @error('name') border-danger @enderror"
                           value="{{ old('name', $project->name) }}"
                           placeholder="Masukkan nama project" required>
                    @error('name')
                        <div class="text-danger text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-align-left mr-2 text-primary"></i>Deskripsi
                    </label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light transition @error('description') border-danger @enderror"
                              placeholder="Jelaskan detail project">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="text-danger text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-tasks mr-2 text-primary"></i>Status
                    </label>
                    <select name="status" id="status"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-light transition @error('status') border-danger @enderror" required>
                        <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="done" {{ old('status', $project->status) == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                    @error('status')
                        <div class="text-danger text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col md:flex-row gap-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-primary to-primary-light text-white px-5 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex items-center justify-center">
                        <i class="fas fa-sync-alt mr-2"></i>Update Project
                    </button>
                    <a href="{{ route('projects.index') }}" class="flex-1 border border-gray-300 text-gray-700 px-5 py-3 rounded-lg font-semibold hover:bg-gray-100 transition text-center flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

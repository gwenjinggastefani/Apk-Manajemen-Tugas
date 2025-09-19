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
<body class="font-sans bg-gradient-to-br from-slate-50 to-slate-200 text-slate-800 min-h-screen p-5">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-3xl">
            
            <!-- Header -->
            <div class="relative bg-gradient-to-r from-primary to-secondary text-white p-8 text-center">
                <div class="inline-flex items-center justify-center w-15 h-15 bg-white/20 rounded-full mb-4">
                    <i class="fas fa-edit text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-2">Edit Task</h1>
                <p class="text-base opacity-90">Perbarui informasi task Anda</p>
            </div>
            
            <!-- Form Body -->
            <div class="p-10">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-7">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-heading text-primary mr-2"></i> Judul Task
                        </label>
                        <input type="text" name="title" id="title"
                               class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('title') border-red-500 @enderror" 
                               value="{{ old('title', $task->title) }}" placeholder="Masukkan judul task" required>
                        @error('title')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-align-left text-primary mr-2"></i> Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('description') border-red-500 @enderror"
                                  placeholder="Masukkan deskripsi task">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-calendar-alt text-primary mr-2"></i> Deadline
                        </label>
                        <input type="date" name="deadline" id="deadline"
                               class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('deadline') border-red-500 @enderror"
                               value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}" required>
                        @error('deadline')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-tasks text-primary mr-2"></i> Status
                        </label>
                        <select name="status" id="status"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('status') border-red-500 @enderror" required>
                            <option value="belum_dikerjakan" {{ old('status', $task->status) == 'belum_dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                            <option value="sedang_dikerjakan" {{ old('status', $task->status) == 'sedang_dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                            <option value="selesai" {{ old('status', $task->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Project -->
                    <div>
                        <label for="project_id" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-project-diagram text-primary mr-2"></i> Project
                        </label>
                        <select name="project_id" id="project_id"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('project_id') border-red-500 @enderror" required>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- User -->
                    <div>
                        <label for="user_id" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-user text-primary mr-2"></i> User
                        </label>
                        <select name="user_id" id="user_id"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('user_id') border-red-500 @enderror" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="mt-2 text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 mt-10">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-primary to-primary-light shadow-lg shadow-primary/25 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl">
                            <i class="fas fa-sync-alt mr-2"></i> Update Task
                        </button>
                        <a href="{{ route('tasks.index') }}" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-slate-600 bg-white border-2 border-slate-200 transition-all duration-300 hover:bg-slate-100 hover:-translate-y-0.5">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

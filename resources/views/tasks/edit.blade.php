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
                    <div class="group">
                        <label for="title" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-heading text-primary mr-2"></i>
                            Judul Task
                        </label>
                        <input type="text" name="title" id="title"
                               class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg transition-all duration-300 outline-none bg-white text-slate-800 focus:border-primary-light focus:ring-3 focus:ring-primary/15 @error('title') border-red-500 @enderror" 
                               value="{{ old('title', $task->title) }}" 
                               placeholder="Masukkan judul task"
                               required>
                        @error('title')
                            <div class="flex items-center mt-2 text-red-500 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="group">
                        <label for="status" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-tasks text-primary mr-2"></i>
                            Status
                        </label>
                        <select name="status" id="status"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg transition-all duration-300 outline-none bg-white text-slate-800 focus:border-primary-light focus:ring-3 focus:ring-primary/15 appearance-none @error('status') border-red-500 @enderror" 
                                required>
                            <option value="belum_dikerjakan" {{ old('status', $task->status) == 'belum_dikerjakan' ? 'selected' : '' }}>
                                Belum Dikerjakan
                            </option>
                            <option value="sedang_dikerjakan" {{ old('status', $task->status) == 'sedang_dikerjakan' ? 'selected' : '' }}>
                                Sedang Dikerjakan
                            </option>
                            <option value="selesai" {{ old('status', $task->status) == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                        @error('status')
                            <div class="flex items-center mt-2 text-red-500 text-sm">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Info Box -->
                    <div class="bg-blue-50 border-l-4 border-info p-4 rounded-lg flex items-start mb-6">
                        <i class="fas fa-info-circle text-info mr-3 mt-1 text-lg"></i>
                        <div>
                            <div class="font-semibold text-slate-800">Pemilik Project:</div>
                            <div class="text-slate-600">{{ $task->project->user->name ?? '-' }}</div>
                            <div class="text-sm text-slate-500 mt-1">Pemilik project tidak dapat diubah melalui form ini</div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="user_id" value="{{ $task->project->user_id }}">

                    <!-- Project -->
                    <div class="group">
                        <label for="project_id" class="flex items-center text-slate-800 font-semibold mb-3">
                            <i class="fas fa-project-diagram text-primary mr-2"></i>
                            Project
                        </label>
                        <select name="project_id" id="project_id"
                                class="w-full px-5 py-3 border-2 border-slate-200 rounded-lg transition-all duration-300 outline-none bg-white text-slate-800 focus:border-primary-light focus:ring-3 focus:ring-primary/15 appearance-none @error('project_id') border-red-500 @enderror" 
                                required>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
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

                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-10">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-primary to-primary-light shadow-lg shadow-primary/25 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-primary/30">
                            <i class="fas fa-sync-alt mr-2"></i>
                            Update Task
                        </button>
                        <a href="{{ route('tasks.index') }}" class="flex-1 inline-flex items-center justify-center px-7 py-3 rounded-lg font-semibold text-slate-600 bg-white border-2 border-slate-200 transition-all duration-300 hover:bg-slate-100 hover:-translate-y-0.5">
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

    <script>
        // Form interaction effects
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('input, select, textarea');
            
            formControls.forEach(control => {
                // Focus effect
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                // Blur effect
                control.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
                
                // Set initial state if filled
                if (control.value) {
                    control.parentElement.classList.add('focused');
                }
            });
            
            // Card animation
            const formCard = document.querySelector('.bg-white');
            formCard.style.opacity = 0;
            formCard.style.transform = 'translateY(20px)';
            
            let opacity = 0;
            const fadeIn = setInterval(() => {
                opacity += 0.05;
                formCard.style.opacity = opacity;
                formCard.style.transform = `translateY(${20 - (20 * opacity)}px)`;
                
                if (opacity >= 1) clearInterval(fadeIn);
            }, 30);
        });
    </script>

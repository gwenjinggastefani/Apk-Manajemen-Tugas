{{-- resources/views/projects/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Project Baru</title>
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
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-gradient-to-br from-slate-50 to-slate-200 text-slate-800 min-h-screen p-5 flex justify-center items-center">
    <div class="w-full max-w-2xl animate-fade-in">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-3xl">

            <!-- Header -->
            <div class="relative bg-gradient-to-br from-primary to-secondary text-white p-10 text-center overflow-hidden">
                <div class="absolute inset-0 bg-gradient-radial from-white/10 via-transparent to-transparent transform rotate-12"></div>
                
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white/15 rounded-full mb-5 backdrop-blur-sm">
                        <i class="fas fa-project-diagram text-3xl"></i>
                    </div>
                    <h1 class="text-4xl font-bold mb-2 tracking-tight">Buat Project Baru</h1>
                    <p class="text-lg opacity-90">Tambahkan project untuk task Anda</p>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-12">
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 mb-6 rounded-r-lg">
                        <h6 class="flex items-center font-semibold">
                            <i class="fas fa-exclamation-triangle mr-2"></i> Terjadi Kesalahan
                        </h6>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('projects.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Nama Project -->
                    <div class="group">
                        <label for="name" class="flex items-center text-slate-800 font-semibold mb-3 text-lg">
                            <i class="fas fa-signature text-primary mr-3 w-5"></i>
                            Nama Project
                        </label>
                        <input type="text" name="name" id="name"
                               class="w-full px-6 py-4 text-base border-2 border-slate-200 rounded-xl transition-all duration-300 outline-none bg-white text-slate-800 font-medium placeholder-slate-400 focus:border-primary focus:ring-4 focus:ring-primary/15 focus:-translate-y-1 @error('name') border-red-500 @enderror"
                               value="{{ old('name') }}" 
                               placeholder="Masukkan nama project"
                               required>
                        @error('name')
                            <div class="flex items-center mt-3 text-red-500 text-sm font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Deskripsi Project -->
                    <div class="group">
                        <label for="description" class="flex items-center text-slate-800 font-semibold mb-3 text-lg">
                            <i class="fas fa-align-left text-primary mr-3 w-5"></i>
                            Deskripsi Project
                        </label>
                        <textarea name="description" id="description"
                                  class="w-full px-6 py-4 text-base border-2 border-slate-200 rounded-xl transition-all duration-300 outline-none bg-white text-slate-800 font-medium placeholder-slate-400 focus:border-primary focus:ring-4 focus:ring-primary/15 focus:-translate-y-1 resize-y min-h-32 leading-6 @error('description') border-red-500 @enderror"
                                  rows="4"
                                  placeholder="Jelaskan detail project">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="flex items-center mt-3 text-red-500 text-sm font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status Project -->
                    <div class="group">
                        <label for="status" class="flex items-center text-slate-800 font-semibold mb-3 text-lg">
                            <i class="fas fa-tasks text-primary mr-3 w-5"></i>
                            Status Project
                        </label>
                        <select name="status" id="status"
                                class="w-full px-6 py-4 text-base border-2 border-slate-200 rounded-xl transition-all duration-300 outline-none bg-white text-slate-800 font-medium focus:border-primary focus:ring-4 focus:ring-primary/15 appearance-none bg-arrow-down @error('status') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Status --</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        @error('status')
                            <div class="flex items-center mt-3 text-red-500 text-sm font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Manager Project -->
                    <div class="group">
                        <label for="user_id" class="flex items-center text-slate-800 font-semibold mb-3 text-lg">
                            <i class="fas fa-user-tie text-primary mr-3 w-5"></i>
                            Manager Project
                        </label>
                        <select name="user_id" id="user_id"
                                class="w-full px-6 py-4 text-base border-2 border-slate-200 rounded-xl transition-all duration-300 outline-none bg-white text-slate-800 font-medium focus:border-primary focus:ring-4 focus:ring-primary/15 appearance-none @error('user_id') border-red-500 @enderror"
                                required>
                            <option value="">-- Pilih Manager --</option>
                            @foreach($users->where('role', 'manager') as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} (Manager)
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="flex items-center mt-3 text-red-500 text-sm font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-5 mt-12 md:flex-row flex-col">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-8 py-4 rounded-xl text-lg font-semibold text-white bg-gradient-to-r from-primary to-primary-light shadow-lg shadow-primary/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/40">
                            <i class="fas fa-plus-circle mr-3 text-xl"></i>
                            Buat Project
                        </button>
                        <a href="{{ route('projects.index') }}" class="flex-1 inline-flex items-center justify-center px-8 py-4 rounded-xl text-lg font-semibold text-slate-600 bg-white border-2 border-slate-200 transition-all duration-300 hover:bg-slate-100 hover:-translate-y-1 hover:shadow-lg">
                            <i class="fas fa-arrow-left mr-3 text-xl"></i>
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.6s ease-out; }
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 18px;
        }
    </style>
</body>

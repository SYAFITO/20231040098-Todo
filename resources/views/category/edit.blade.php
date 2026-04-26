<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500 dark:from-indigo-400 dark:to-purple-400 leading-tight">
                {{ __('Edit Category') }}
            </h2>
        </div>
    </x-slot>

    <!-- Super vibrant and modern gradient background -->
    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen relative overflow-hidden">
        
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[10%] -right-[10%] w-[40%] h-[40%] bg-gradient-to-br from-indigo-400 to-purple-400 rounded-full blur-[120px] opacity-20 dark:opacity-30"></div>
            <div class="absolute top-[60%] -left-[10%] w-[30%] h-[50%] bg-gradient-to-tr from-purple-400 to-fuchsia-400 rounded-full blur-[100px] opacity-20 dark:opacity-20 animate-pulse"></div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <!-- Premium Glassmorphism Card -->
            <div class="bg-white/70 dark:bg-gray-800/60 backdrop-blur-2xl rounded-[2rem] shadow-2xl overflow-hidden border border-white/50 dark:border-gray-700/50 transform transition-all duration-500">
                <div class="p-10 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Category Details</h3>
                        <p class="mt-2 text-md text-gray-500 dark:text-gray-400">Update the category details below.</p>
                    </div>

                    <form method="POST" action="{{ route('category.update', $category->id) }}" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Category Name Input -->
                            <div class="col-span-2 relative group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors group-focus-within:text-indigo-600 dark:group-focus-within:text-indigo-400">Category Name <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" 
                                        class="block w-full pl-12 pr-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm focus:bg-white dark:focus:bg-gray-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 {{ $errors->has('name') ? 'border-rose-500 ring-1 ring-rose-500' : '' }}" 
                                        placeholder="E.g. Electronics" required>
                                </div>
                                @error('name') 
                                    <p class="text-rose-500 text-sm mt-2 flex items-center font-medium animate-pulse"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-10 pt-6 border-t border-gray-100 dark:border-gray-700/50">
                            <a href="{{ route('category.index') }}" class="mr-4 inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-xl text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-all shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 rounded-xl shadow-lg shadow-indigo-500/30 font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-500 hover:from-indigo-500 hover:to-purple-400 transform hover:-translate-y-1 transition-all duration-300 hover:shadow-indigo-500/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
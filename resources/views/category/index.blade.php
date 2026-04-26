<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500 dark:from-indigo-400 dark:to-purple-400 leading-tight">
                {{ __('Category List') }}
            </h2>
            <div class="flex gap-3">
                <a href="{{ route('category.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-500 hover:to-purple-500 transition-all shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="-ml-1 mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    New Category
                </a>
            </div>
        </div>
    </x-slot>

    <!-- Vibrant Gradient Background -->
    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen relative overflow-hidden">
        
        <!-- Subtle Glow Orbs -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-gradient-to-br from-purple-400 to-indigo-400 rounded-full blur-[120px] opacity-20 dark:opacity-20 animate-pulse"></div>
            <div class="absolute bottom-[0%] right-[0%] w-[50%] h-[50%] bg-gradient-to-tl from-indigo-400 to-fuchsia-400 rounded-full blur-[100px] opacity-10 dark:opacity-10" style="animation-delay: 1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if (session('success'))
                <div class="mb-6 bg-indigo-100/80 dark:bg-indigo-900/40 backdrop-blur-sm border border-indigo-400 text-indigo-800 dark:text-indigo-300 px-6 py-4 rounded-2xl shadow-sm flex items-center justify-between animate-fade-in-down" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="block sm:inline font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl shadow-2xl rounded-[2rem] border border-white/60 dark:border-gray-700/60 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">All Categories</h3>
                </div>
                
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left table-auto whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-900/50 text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider">
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 w-16 text-center">No.</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Category Name</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">Total Products</th>
                                <th class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 w-32 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse($categories as $category)
                                <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-700/50 transition-colors duration-200 group">
                                    <td class="px-6 py-4 text-gray-500 dark:text-gray-400 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-sm">
                                                <span class="text-white font-bold text-sm">{{ substr($category->name, 0, 1) }}</span>
                                            </div>
                                            <span>{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400">
                                            {{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 flex gap-2 justify-center">
                                        <a href="{{ route('category.edit', $category->id) }}" class="p-2 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-500 hover:text-white rounded-lg transition-all duration-200" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 hover:bg-rose-500 hover:text-white rounded-lg transition-all duration-200" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                            <svg class="h-12 w-12 mb-4 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-lg font-medium">No categories found</p>
                                            <p class="text-sm mt-1 text-gray-400">Get started by creating a new category.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
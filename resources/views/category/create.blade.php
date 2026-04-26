<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Category
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">
                            Category Name
                        </label>
                        <input type="text" name="name"
                               class="w-full border rounded px-3 py-2"
                               required>

                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('category.index') }}"
                           class="bg-gray-400 text-white px-4 py-2 rounded">
                            Back
                        </a>

                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Save
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
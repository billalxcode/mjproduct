<x-app-layout>
    @include('blog.partials.header')
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('blog.partials.form')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('blog.partials.delete-form')
                </div>
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        @vite('resources/js/pages/admin/blog.js')
    </x-slot>
</x-app-layout>

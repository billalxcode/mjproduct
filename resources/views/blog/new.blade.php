<x-app-layout>
    <x-slot name="css">
        @vite('resources/css/pages/blog.css')
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('blog.partials.form')
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        @vite('resources/js/pages/admin/blog.js')
    </x-slot>
</x-app-layout>

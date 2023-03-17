<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <a href="{{ route('dashboard.project.create') }}">
                <x-primary-button class="mb-3">
                    {{ __('New') }}
                </x-primary-button>
            </a>
            <div class="grid gap-8 lg:grid-cols-2">
                
            </div>
        </div>
    </section>
</x-app-layout>

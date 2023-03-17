<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Project') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your article is deleted, all of its resources and data will be permanently deleted. Before deleting your article, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Project') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('dashboard.blog.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your article is deleted, all of its resources and data will be permanently deleted. Before deleting your article, please download any data or information that you wish to retain.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Project') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

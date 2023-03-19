<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Post new article') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("You can create new articles and display them on the blog page") }}
        </p>
    </header>

    <form method="post" action="{{ $action ?? route('dashboard.blog.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', ($blogs->title ?? ''))" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-textarea-input name="content" :value="old('content', ($blogs->content ?? ''))" required />
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-select-input name="status">
                <option value="private" {{ isset($blogs) && $blogs->status == 'private' ? 'selected' : ''}}>Private</option>
                <option value="publish" {{ isset($blogs) && $blogs->status == 'publish' ? 'selected' : ''}}>Publish</option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div id="parent_select">
            <x-input-label for="category" :value="__('Category')" />
            <div class="flex flex-row">
                <div class="grow w-full">
                    <select name="category_id" id="category_input">
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div class="grow mx-2">
                    <x-primary-button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-new-category')">{{ __('Create') }}</x-primary-button>
                </div>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="image" />
                </label>
            </div> 
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

    <x-modal name="create-new-category" focusable>
        <form method="post" action="{{ route('dashboard.category.create') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create category') }}
            </h2>

            <div>
                <x-input-label for="name" :value="__('Category Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('category.name')" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
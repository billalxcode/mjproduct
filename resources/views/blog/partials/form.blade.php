<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Post new article') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("You can create new articles and display them on the blog page") }}
        </p>
    </header>

    <form method="post" action="{{ $action ?? route('dashboard.blog.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', ($blogs->title ?? ''))" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-textarea-input name="content" :value="__($blogs->content ?? '')" required />
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

        <div>
            <x-input-label for="category" :value="__('Category')" />
            <x-select-input name="category" id="category_input">
                <option value="technology">Technology</option>
                <option value="code">Code</option>
                <option value="codereview">Code Review</option>
                
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add new person to team') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("You can create new person and display them on the portfolio page") }}
        </p>
        {{-- {{ $errors }} --}}
    </header>

    <form method="post" action="{{ $action ?? route('dashboard.project.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>   
            <x-input-label for="person_name" :value="__('person Name')" />
            <x-text-input id="person_name" name="person_name" type="text" class="mt-1 block w-full" :value="old('person_name', ($person->person_name ?? ''))" required autofocus autocomplete="person_name" />
            <x-input-error class="mt-2" :messages="$errors->get('person_name')" />
        </div>

        <div>
            <x-input-label for="person_description" :value="__('person Description')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-textarea-input name="person_description" :value="old('person_description', ($person->person_description ?? ''))" required />
            <x-input-error class="mt-2" :messages="$errors->get('person_description')" />
        </div>

        <div>
            <x-input-label for="person_position" :value="__('person position')" />
            <x-text-input id="person_position" name="person_position" type="text" class="mt-1 block w-full" :value="old('person_position', ($person->person_position ?? ''))" required autofocus autocomplete="person_position" />
            <x-input-error class="mt-2" :messages="$errors->get('person_position')" />
        </div>

        <div>
            <x-input-label for="facebook_url" :value="__('Facebook url (opsional)')" />
            <x-text-input id="facebook_url" name="facebook_url" type="text" class="mt-1 block w-full" :value="old('facebook_url', ($person->facebook_url ?? ''))" required autofocus autocomplete="facebook_url" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook_url')" />
        </div>

        <div>
            <x-input-label for="twitter_url" :value="__('Twitter url (opsional)')" />
            <x-text-input id="twitter_url" name="twitter_url" type="text" class="mt-1 block w-full" :value="old('twitter_url', ($person->twitter_url ?? ''))" required autofocus autocomplete="twitter_url" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter_url')" />
        </div>

        <div>
            <x-input-label for="instagram_url" :value="__('Instagram url (opsional)')" />
            <x-text-input id="instagram_url" name="instagram_url" type="text" class="mt-1 block w-full" :value="old('instagram_url', ($person->instagram_url ?? ''))" required autofocus autocomplete="instagram_url" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram_url')" />
        </div>

        <div>
            <x-input-label for="linkedin_url" :value="__('Linkededin url (opsional)')" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="text" class="mt-1 block w-full" :value="old('linkedin_url', ($person->linkedin_url ?? ''))" required autofocus autocomplete="linkedin_url" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
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
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
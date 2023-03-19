<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create new project') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("You can create new project and display them on the portfolio page") }}
        </p>
        {{-- {{ $errors }} --}}
    </header>

    <form method="post" action="{{ $action ?? route('dashboard.project.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="project_name" :value="__('Project Name')" />
            <x-text-input id="project_name" name="project_name" type="text" class="mt-1 block w-full" :value="old('project_name', ($project->project_name ?? ''))" required autofocus autocomplete="project_name" />
            <x-input-error class="mt-2" :messages="$errors->get('project_name')" />
        </div>

        <div>
            <x-input-label for="project_description" :value="__('Project Description')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-textarea-input name="project_description" :value="old('project_description', ($project->project_description ?? ''))" required />
            <x-input-error class="mt-2" :messages="$errors->get('project_description')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            {{-- <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" /> --}}
            <x-select-input name="project_status">
                <option value="progress" {{ isset($project) && $project->status == 'progress' ? 'selected' : ''}}>On Progress</option>
                <option value="done" {{ isset($project) && $project->status == 'done' ? 'selected' : ''}}>Done</option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div>
            <x-input-label for="project_start_date" :value="__('Project Start Date')" />
            <x-text-input id="project_start_date" name="project_start_date" type="date" class="mt-1 block w-full" :value="old('project_start_date', ($project->project_start_date ?? ''))" required autofocus autocomplete="project_start_date" />
            <x-input-error class="mt-2" :messages="$errors->get('project_start_date')" />
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
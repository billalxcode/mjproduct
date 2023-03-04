@props(['value'])

<textarea {{ $attributes->merge(['class' => 'content-editor block w-full mt-1 rounded-md', 'id' => 'editor', 'row' => 30]) }}>
    {{ $value ?? ''}}
</textarea>
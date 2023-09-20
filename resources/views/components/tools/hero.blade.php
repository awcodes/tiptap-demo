@php
    $colors = [
        'gray_light' => 'Gray - Light',
        'gray' => 'Gray',
        'gray_dark' => 'Gray - Dark',
        'primary' => 'Primary',
        'secondary' => 'Secondary',
        'tertiary' => 'Tertiary',
        'accent' => 'Accent',
    ];
@endphp

<x-filament-tiptap-editor::dropdown-button
    label="Hero"
    active="hero"
>
    <x-slot name="customIcon">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm0-2h14v-5H5v5Z"/></svg>
    </x-slot>

    @foreach($colors as $key => $label)
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().commands.toggleHero({ color: '{{ $key }}' })"
        >
            {{ $label }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endforeach
</x-filament-tiptap-editor::dropdown-button>

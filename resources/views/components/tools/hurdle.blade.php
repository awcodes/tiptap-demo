@php
    $colors = ['gray_light', 'gray', 'gray_dark', 'primary', 'secondary', 'tertiary', 'accent'];
@endphp

<x-filament-tiptap-editor::dropdown-button
        label="{{ __('filament-tiptap-editor::editor.hurdle.label') }}"
        active="'hurdle'"
        icon="hurdle"
>
    @foreach($colors as $color)
        <x-filament-tiptap-editor::dropdown-button-item
                action="editor().chain().focus().setHurdle({ color: '{{ $color }}' }).run()"
        >
            {{ __('filament-tiptap-editor::editor.hurdle.colors.' . $color) }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endforeach
</x-filament-tiptap-editor::dropdown-button>

@vite('resources/js/tools/hurdle.js')
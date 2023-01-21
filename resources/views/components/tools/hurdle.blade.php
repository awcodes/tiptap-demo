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
    label="Hurdle"
    active="'hurdle'"
    icon="hurdle"
>
    @foreach($colors as $key => $label)
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().setHurdle({ color: '{{ $key }}' }).run()"
        >
            {{ $label }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endforeach
</x-filament-tiptap-editor::dropdown-button>

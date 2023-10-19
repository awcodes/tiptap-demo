@props([
    'data' => [
        'name' => null,
        'suit_color' => null,
    ],
])

<x-filament-tiptap-editor::block>
    <livewire:test-block-component :data="$data"/>
</x-filament-tiptap-editor::block>

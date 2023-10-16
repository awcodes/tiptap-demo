<x-filament::section>
    <x-filament::section.heading>
        I'm a livewire component
    </x-filament::section.heading>

    <div class="mt-4">
        <p>Name: {{ $data['name'] ?? 'empty' }}</p>
{{--        {{ $this->form }}--}}
    </div>

    <div class="mt-4">
        {{ $this->testAction }}
    </div>

    @teleport('body')
    <div wire:key="{{ 'block.' . $this->getId() }}" wire:ignore.self>
    <x-filament-actions::modals />
    </div>
    @endteleport
</x-filament::section>

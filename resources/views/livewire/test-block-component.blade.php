<x-filament::section>
    <x-filament::section.heading>
        I'm a livewire component
    </x-filament::section.heading>

    {{ $this->form }}

    {{ $this->testAction }}

    @teleport('body')
    <x-filament-actions::modals />
    @endteleport
</x-filament::section>

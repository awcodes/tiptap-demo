<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div class="mt-8">
            <x-filament::button type="submit">
                Submit
            </x-filament::button>
        </div>
    </form>
</x-filament::page>

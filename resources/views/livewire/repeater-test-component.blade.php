<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div class="mt-4">
            <x-filament::button type="submit">
                Submit
            </x-filament::button>
        </div>
    </form>
    <x-filament-actions::modals />
</div>

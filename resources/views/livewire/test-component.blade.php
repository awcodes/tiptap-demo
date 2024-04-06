<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
    </form>

    <x-filament-actions::modals />
</div>

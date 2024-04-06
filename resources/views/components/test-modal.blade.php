@if (! $this->hasFormsModalRendered)
    @php
        $action = $this->getMountedFormComponentAction();
    @endphp

    <form wire:submit.prevent="callMountedFormComponentAction">
        <x-filament::modal
            :alignment="$action?->getModalAlignment()"
            :close-button="$action?->hasModalCloseButton()"
            :close-by-clicking-away="$action?->isModalClosedByClickingAway()"
            :description="$action?->getModalDescription()"
            display-classes="block"
            :footer-actions="$action?->getVisibleModalFooterActions()"
            :footer-actions-alignment="$action?->getModalFooterActionsAlignment()"
            :heading="$action?->getModalHeading()"
            :icon="$action?->getModalIcon()"
            :icon-color="$action?->getModalIconColor()"
            :id="$this->getId() . '-form-component-action'"
            :slide-over="$action?->isModalSlideOver()"
            :sticky-footer="$action?->isModalFooterSticky()"
            :sticky-header="$action?->isModalHeaderSticky()"
            :visible="filled($action)"
            :width="$action?->getModalWidth()"
            :wire:key="$action ? $this->getId() . '.' . $action->getComponent()->getStatePath() . '.actions.' . $action->getName() . '.modal' : null"
            x-on:modal-closed.stop="
                const mountedFormComponentActionShouldOpenModal = {{ \Illuminate\Support\Js::from($action && $this->mountedFormComponentActionShouldOpenModal()) }}

                if (mountedFormComponentActionShouldOpenModal) {
                    $wire.unmountFormComponentAction(false)
                }
            "
        >
            @if ($action)
                {{ $action->getModalContent() }}

                @if ($this->mountedFormComponentActionHasForm())
                    {{ $this->getMountedFormComponentActionForm() }}
                @endif

                {{ $action->getModalContentFooter() }}
            @endif
        </x-filament::modal>
    </form>

    @php
        $this->hasFormsModalRendered = true;
    @endphp
@endif

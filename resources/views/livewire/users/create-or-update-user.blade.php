<x-modal-card
    title="{{ $id !== null ? __('users.labels.edit_form_title') : __('users.labels.edit_form_title')}}"
    wire:model.live="visible">

    <x-input label="{{__('users.attributes.name') }}" placeholder="{{ __('Enter value') }}" wire:model="name" />
    <x-slot name="footer" class="flex justify-end">
        <div class="flex gap-x-4">
            <x-button flat label="{{ __('Cancel') }}" x-on:click="close" />

            <x-button primary label="{{ __('Save') }}" wire:click="save" spinner />
        </div>
    </x-slot>
</x-modal-card>

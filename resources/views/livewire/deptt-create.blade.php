<div class="max-w-screen-md mx-auto">
    <form wire:submit="saveDeptt" class="space-y-3 mt-10">
        <x-input wire:model="deptt" label="Add Deptt" placeholder="Add Deptt"/>
        <x-button label="Save" class="btn-primary  w-full" type="submit"/>
    </form>
</div>

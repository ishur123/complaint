<div class="max-w-screen-md mx-auto my-10">
    <form wire:submit="saveState">
        <div class="flex flex-row space-x-3">
            <div class="w-3/4">
                <x-input wire:model="state" placeholder="Add State"/>
            </div>
            <x-button label="Save" class="btn-primary w-1/4" type="submit"/>
        </div>
    </form>
</div>

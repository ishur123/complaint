<div class="max-w-screen-md mx-auto my-10">
    <div class="my-4">
        <form wire:submit="saveCaste" class="flex space-x-3">
            <div class="w-3/4">
                <x-input wire:model="caste" placeholder="Add Caste"/>
            </div>
            <x-button label="Save" class="btn-primary  w-1/4" type="submit"/>
        </form>
    </div>
</div>


<div class="max-w-screen-md mx-auto my-10">
    <form wire:submit="saveDistt">
        <div class="flex flex-col space-y-3">
            <x-select wire:model="selMandal" label="Select Mandal"
                      placeholder="Select Mandal"
                      option-value="mandalId"
                      option-label="mandalName"
                      :options="$mandals"/>
            <x-input wire:model="distt" placeholder="Add Distt"/>
            <x-button label="Save" class="btn-primary w-full" type="submit"/>
        </div>
    </form>
</div>

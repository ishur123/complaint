<div class="max-w-screen-md mx-auto">
    <form wire:submit="saveVillage" class="space-y-6 my-10">
        <x-select wire:model="selDistt" label="Select Distt"
                  placeholder="Select Distt"
                  option-value="disttId"
                  option-label="disttName"
                  :options="$distts"/>

        <x-input wire:model="village" placeholder="Add Village"/>

        <x-button label="Save" class="btn-primary  w-full" type="submit"/>
    </form>
</div>

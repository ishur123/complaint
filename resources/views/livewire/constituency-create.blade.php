<div class="max-w-screen-md mx-auto my-10">
    <form wire:submit="saveConstituency">
        <div class="flex flex-col space-y-3">
            <x-select wire:model="selState" label="Select State"
                      placeholder="Select State"
                      option-value="stateId"
                      option-label="stateName"
                      :options="$states"/>
            <x-input wire:model="constituency" label="Add Constituency" placeholder="Add Constituency"/>
            <x-button label="Save" class="btn-primary w-full" type="submit"/>
        </div>
    </form>
</div>

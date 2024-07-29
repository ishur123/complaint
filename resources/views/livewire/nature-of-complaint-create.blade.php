<div class="max-w-screen-md mx-auto">
    <form wire:submit="saveNatureOfComplaint" class="space-y-6 my-10">
        <x-input wire:model="natureOfComplaint" label="Add Nature Of Complaint" placeholder="Add Nature Of Complaint"/>
        <x-button label="Save" class="btn-primary  w-full" type="submit"/>
    </form>
</div>

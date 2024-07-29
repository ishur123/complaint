<div>
    <div style="display: flex; justify-content: center; align-items: center; height: 60vh;">
        <x-card title="Check Complaint" separator progress-indicator>
            <x-form wire:submit="checkMobile">
                <x-input wire:model="name" label="Name" placeholder="Enter Name" icon="o-user"/>
                <x-input wire:model="mobile" label="Mobile" placeholder="Your mobile number"
                         icon="o-user" required/>
                <x-button type="submit" label="Check" style="margin-top: 10px;"/>
            </x-form>
        </x-card>
    </div>
</div>

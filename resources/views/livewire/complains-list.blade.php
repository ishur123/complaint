<div class="space-y-5">
    <x-card title="Search Here">
        <div class="flex flex-row space-x-2">
        <x-input wire:model="name" wire:keyup="filter" placeholder="Enter Name"/>
        <x-input wire:model="mobile" wire:keyup="filter" placeholder="Enter Mobile Number"/>
        <x-datetime wire:model="dateOpen" wire:keyup="filter"/>
        <x-select wire:model="status" wire:change="filter" :options="$statuses" placeholder="Select Status" placeholder-value="all"/>
        </div>
    </x-card>

<x-card title="Complaints">
    <x-table :headers="$headers" :rows="$complaints" striped/>
</x-card>
</div>

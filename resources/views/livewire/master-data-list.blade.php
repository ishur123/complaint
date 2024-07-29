<div class="max-w-screen-xl mx-auto">
    <x-card title="Search Here" class="w-1/3">
        <x-input wire:model="searchTerm" wire:keyup="filter" placeholder="Search..."/>
    </x-card>

    <x-card title="Master Data Records">
        <x-table :headers="$headers" :rows="$masterRecords" striped>
            @scope('actions', $masterRecord)
            <div class="flex space-x-2">
                <x-button icon="o-pencil-square" wire:click="delete({{ $masterRecord->id }})" class="btn-primary"/>
                <x-button icon="o-trash" wire:click="delete({{ $masterRecord->id }})" class="btn-error"/>
            </div>
            @endscope
        </x-table>
    </x-card>

</div>

<div class="space-y-5">
    <x-card title="Complainant Details">
        <x-list-item :item="$complainant" no-separator no-hover>
    <x-slot:value>
        <div class="flex space-x-8">
            <div>
                <div>Name - {{$complainant->name}}</div>
                 <div>Mobile       - {{$complainant->mobile}}</div>
                </div>
<!--                 <img src="{{asset('/storage/'.$complainant->photo)}}" class="h-20"/>-->
            </div>
    </x-slot:value>
    <x-slot:sub-value>
        <div>Address      - {{$complainant->address}}</div>
        <div>Designation  - {{$complainant->designation}}</div>
        <div>Organization - {{$complainant->organisation}}</div>
        <div>Village      - {{$complainant->village->villageName}}</div>
        <div>Caste        - {{$complainant->cast->castName}}</div>
    </x-slot:sub-value>
    <x-slot:actions>
        <x-button label="Add Complaint" @click="$wire.addComplaintModal = true" class="btn-primary"/>
    </x-slot:actions>
</x-list-item>
    </x-card>
    <x-card>
        <x-table :headers="$headers" :rows="$complains" striped>
             @scope('cell_edit', $complain)
                 <x-button icon="o-pencil-square" link="{{route('complaint-edit',[$complain->complaintNo])}}"
                           class="btn-sm"/>
             @endscope
        </x-table>
    </x-card>

    <x-modal wire:model="addComplaintModal">
        <x-form wire:submit="addComplant">
            <x-select wire:model="departmentRelatedTo"
                      option-value="depttId"
                      option-label="depttName"
                      :options="$departments"
                      label="Department related to"
                      placeholder="department" icon="" hint="" required/>

                <x-select wire:model="natureOfComplaintRelatedTo"
                          option-value="compId"
                          option-label="compName"
                          :options="$natureOfComplaints"
                          label="Nature of complaint related to"
                          placeholder="nature" icon="" hint="" required/>

                <x-input wire:model="complainDetails" label="Complaint details" placeholder="details" icon="" hint=""
                         required/>
                <x-input wire:model="assignTo" label="Assigned to" placeholder="assign to" icon="" hint="" required/>

                <x-slot name="actions">
                    <x-button label="Cancel" @click="$wire.addComplaintModal = false"/>
                    <x-button type="submit" label="Confirm" class="btn-primary"/>
                </x-slot>
        </x-form>
    </x-modal>
</div>

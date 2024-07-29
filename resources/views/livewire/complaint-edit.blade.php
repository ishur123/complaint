<div class="space-y-5">
    <x-card title="Complaint">
          <x-list-item :item="$complaint" no-separator no-hover>
             <x-slot:value>
                 <div class="flex flex-row">
                     <div>{{$complaint->complaintDetails}}</div>
                     <div class="ml-auto">
                         <x-button label="Add Remark" @click="$wire.addRemarkModal = true" class="btn-primary"/>
                         </div>
                 </div>
             </x-slot:value>
              <x-slot:sub-value>

              </x-slot:sub-value>
</x-list-item>
    </x-card>

    <x-card title="Previous Remarks">
        @foreach($remarks as $remark)
        <x-list-item :item="$remark"  separator no-hover>
            <x-slot:value>
                {{$remark->actionType}}
            </x-slot:value>
            <x-slot:sub-value>
                <div>{{$remark->tranDate}}</div>
                <div>{{$remark->assignedTo}}</div>
                <div class="font-semibold">{{$remark->remarks}}</div>
            </x-slot:sub-value>
            <x-slot:actions>
                <x-badge value="{{$remark->status}}" class="badge-primary" />
            </x-slot:actions>
        </x-list-item>
        @endforeach
    </x-card>

    <x-modal wire:model="addRemarkModal" title="Add Remark" separator>
        <x-form wire:submit="addRemark">
            <x-select wire:model="actionType" :options="$actionTypes" label="Action Type"
                      placeholder="Select Action Type"/>
            <x-select wire:model="assignTo" :options="$assignTos" label="Assign To" placeholder="Select assignee"/>
            <x-textarea wire:model="remark" label="Assign To" placeholder="Add Remark" rows="2"/>
            <x-select wire:model="status" :options="$statuses" label="Select Status" placeholder="Select Status"/>

            <x-button type="submit" label="Submit" class="btn-primary"/>
        </x-form>
    </x-modal>
</div>

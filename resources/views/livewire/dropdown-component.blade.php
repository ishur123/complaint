<div class="max-w-screen-md mx-auto">
    <x-card title="Dropdown">
        <form wire:submit.preventss="saveMasterData">
            <div class="space-y-6">
                <div class="flex items-center space-x-3 space-y-6">
                    <div class="w-3/4">
                        <x-select wire:model="selState" label="Select State"
                                  placeholder="Select State"
                                  option-value="stateId"
                                  option-label="stateName"
                                  :options="$states"/>
                    </div>
                    <x-button label="Add State" class="mt-6 w-1/4" @click="addState = true"
                              link="{{route('state-create')}}"/>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selConstituency" label="Constituency"
                                  placeholder="Select Village"
                                  option-value="constituencyId"
                                  :options="$constituencies"/>
                    </div>
                    <x-button label="Add Constituency" class="mt-6 w-1/4" link="{{route('constituency-create')}}"/>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selMandal" label="Mandal"
                                  placeholder="Select Mandal"
                                  option-value="mandalId"
                                  option-label="mandalName"
                                  :options="$mandals"/>
                    </div>
                    <x-button label="Add Mandal" class="mt-6 w-1/4" link="{{route('mandal-create')}}"/>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selDistt" label="Distt"
                                  placeholder="Select Distt"
                                  option-value="disttId"
                                  option-label="disttName"
                                  :options="$distts"/>
                    </div>
                    <x-button label="Add Distt" class="mt-6 w-1/4" link="{{route('distt-create')}}"/>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selVillage" label="Select Village"
                                  placeholder="Select Village"
                                  option-value="villageId"
                                  option-label="villageName"
                                  :options="$villages"/>
                    </div>
                    <x-button label="Add Village" class="mt-6 w-1/4" link="{{route('village-create')}}" />
                </div>

                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selDeptt" label="Deptt" placeholder="Select Deptt"
                                  option-value="depttId"
                                  option-label="depttName"
                                  :options="$deptts"/>
                    </div>
                    <x-button label="Add Deptt" class="mt-6 w-1/4" link="{{route('deptt-create')}}"/>
                </div>


                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="natureOfComplaint" label="Nature of Complaint"
                                  placeholder="Select Nature of Complaint"
                                  option-value="compId"
                                  option-label="compName"
                                  :options="$natureOfComplaints"/>
                    </div>
                    <x-button label="Add Nature of Complaint" class="mt-6"
                              link="{{route('nature-of-complaint-create')}}"/>
                </div>


                <div class="flex items-center space-x-3">
                    <div class="w-3/4">
                        <x-select wire:model="selCaste" label="Caste" placeholder="Select Caste"
                                  option-value="castId"
                                  option-label="castName"
                                  :options="$castes"/>
                    </div>
                    <x-button label="Add Cast" class="mt-6 w-1/4" link="{{route('caste-create')}}"/>
                </div>

                <x-button label="Save" type="submit" class="btn-primary w-full"/>
            </div>
        </form>
    </x-card>
</div>

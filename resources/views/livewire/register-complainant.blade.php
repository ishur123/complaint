<div>
<x-card title="Register User" separator>
            <x-form wire:submit="saveComplainant" class="max-w-screen-lg mx-auto">
                <div class="flex">
                    <div>
                          <x-input wire:model="name" label="Name" placeholder="Your name" icon="o-user" hint="" required/>
                             <x-input type="number" wire:model="mobile" label="Mobile" placeholder="Your Mobile Number" icon="o-user"
                         hint="" required/>
                        </div>
                    <div>
                        {{-- <x-file wire:model="photo" accept="image/png, image/jpeg">
                             <img src="{{ $user->avatar ?? 'https://placehold.jp/150x150.png' }}"
                                  class="h-40 rounded-lg"/>
                         </x-file> --}}
                    </div>
                </div>
                <div style="display: flex; width: 50%; align-items: center;">
                    <div style="flex: 1; min-width: 50%;">
                        <x-select
                            label="Village"
                            wire:model="selectVillage"
                            option-value="villageID"
                            option-label="villageName"
                            :options="$villages"
                            placeholder="Select Village"
                            placeholder-value="0"
                            hint=""
                            style="width: 100%; min-width: 200px;"
                            required/>
                           

                    </div>
                    <x-button label="Add Village" @click="$wire.myModal3 = true"
                              style="margin-left: 100px; margin-top: 25px;  position: relative; z-index: 1;"/>
                </div>




                <div style="display: flex; width: 50%; align-items: center;">
                    <div style="flex: 1; min-width: 50%;">
                        <x-select
                            label="Caste"
                            wire:model="selectedCast"
                            option-value="castId"
                            option-label="castName"
                            :options="$casts"
                            placeholder="Select Caste"
                            placeholder-value="0"
                            hint=""
                            style="width: 100%; min-width: 200px;"
                        />
                    </div>
                    <x-button label="Add Caste" @click="$wire.myModal4 = true"
                              style="margin-left: 100px; margin-top: 25px;  position: relative; z-index: 1;"/>
                </div>

                <x-input wire:model="address" label="Address" placeholder="Your address" icon="" hint="" required/>
                <x-input wire:model="designation" label="Designation" placeholder="Your designation" icon="" hint=""
                         required/>
                <x-input wire:model="organisation" label="Organization" placeholder="Your organization" icon="" hint=""
                         required/>

                <x-slot name="actions">
                    <x-button label="Cancel"/>
                    <x-button type="submit" label="Confirm" class="btn-primary"/>
                </x-slot>
            </x-form>

            <x-modal wire:model="myModal3" title="Village" subtitle="" separator>
                <x-form wire:submit="addVillage">
                  <div class="flex flex-row"> <div class="w-3/4"> <x-select wire:model="selDistt" :options="$distts" option-label="disttName" option-value="disttId"
                              placeholder="Select Distt" label="Select Distt" required/></div>
                              <x-button label="Add District" @click="$wire.addDist = true"
                              style="margin-left: 100px; margin-top: 25px;  position: relative; z-index: 1;"/> </div> 
                    <x-input class="w-1/4" wire:model="village" placeholder="Your Village" label="Enter Village Name" icon="" hint=""
                             required/>

                    <x-slot name="actions">
                        <x-button label="Cancel" @click="$wire.myModal3 = false"/>
                       
                        <x-button type="submit" label="Confirm" class="btn-primary"/>
                    </x-slot>
                </x-form>
            </x-modal>


            <x-modal wire:model="addDist" title="District" subtitle="" separator>
                <x-form wire:submit="district">
                  <div class="flex flex-col"> <div class="w-3/4"> <x-select wire:model="selMandal" :options="$mandals" option-label="mandalName" option-value="mandalId"
                              placeholder="Select Mandal" label="Select Mandal" required/></div>
                              {{-- <x-button label="Add District" @click="$wire.addDist = true"
                              style="margin-left: 100px; margin-top: 25px;  position: relative; z-index: 1;"/> </div>  --}}
                    <x-input class="w-1/4" wire:model="disttName" placeholder="Your District" label="Enter District Name" icon="" hint=""
                             required/>

                    <x-slot name="actions">
                        <x-button label="Cancel" @click="$wire.addDist = false"/>
                       
                        <x-button type="submit" label="Confirm" class="btn-primary"/>
                    </x-slot>
                </x-form>
            </x-modal>

        </x-card>
</div>

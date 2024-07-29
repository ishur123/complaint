<?php

namespace App\Livewire;

use App\Models\Distt;
use App\Models\Village;
use Livewire\Component;
use Mary\Traits\Toast;

class VillageCreate extends Component
{
    use Toast;
    public $distts;
    public $selDistt;
    public $village;

    public function mount(){
        $this->distts = Distt::all();
    }

    public function saveVillage()
    {
        if ($this->village) {
            $village = new Village();
            $village->disttId = $this->selDistt;
            $village->villageName = $this->village;
            $village->save();

            $this->toast(
                type: 'success',
                title: $this->village . ' Added Successfully',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );

            $this->redirectRoute('villageForm');

        } else {
            $this->toast(
                type: 'success',
                title: 'Pleae Enter Village Name',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );
        }
    }

    public function render()
    {
        return view('livewire.village-create');
    }
}
